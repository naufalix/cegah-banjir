<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Impact;
use App\Models\Assistance;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Maatwebsite\Excel\Facades\Excel;

class DashAssistance extends Controller
{

    public function index(){
        return view('dashboard.assistance',[
            "title" => "Dashboard | Beri bantuan",
            "impacts" => Impact::whereStatus(0)->orderBy("id","DESC")->get(),
            "assistances" => Assistance::whereUserId(auth()->user()->id)->orderBy("id","DESC")->get(),
        ]);
    }

    public function postHandler(Request $request){
        //dd($request);
        if($request->submit=="store"){
            $res = $this->store($request);
            return back()->with($res['status'],$res['message']);
        }
        // if($request->submit=="update"){
        //     $res = $this->update($request);
        //     return back()->with($res['status'],$res['message']);
        // }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return back()->with($res['status'],$res['message']);
            // return back()->with("info","Fitur hapus sementara dinonaktifkan");
        }
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'impact_id'=>'required',
            'description'=>'required',
            'provider'=>'required',
            'image' => 'required|image|file|max:1024',
        ]);
        $validatedData['point'] = 1;
        $validatedData['user_id'] = auth()->user()->id;

        //Read image
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('image'));
        
        // Resize image
        $maxwidth = 500;
        $maxheight = 500;
        if ($image->width() > $image->height()) {
            if ($image->width() > $maxwidth) {
                $newheight = $image->height() / ($image->width() / $maxwidth);
                $image->resize($maxwidth, $newheight);
            }
        } else {
            if ($image->height() > $maxheight) {
                $newwidth = $image->width() / ($image->height() / $maxheight);
                $image->resize($newwidth, $maxheight);
            }
        }

        //Convert to .webp
        $imageWebp = $image->toWebp(100);
        
        // Upload new image
        $validatedData['image'] = time().".webp";
        $imageWebp->save('assets/img/assistance/'.$validatedData['image']);

        // Create data
        Assistance::create($validatedData);

        // Update user point
        $user = User::find(auth()->user()->id);
        $user->point += 1;
        $user->save();

        // Update flood status
        $impact = Impact::find($request->impact_id);
        $impact->status = 1;
        $impact->save();

        return ['status'=>'success','message'=>'Data berhasil ditambahkan'];
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);

        $assistance = Assistance::find($request->id);

        // Check if the data is found
        if (!$assistance) {
            return ['status' => 'error', 'message' => 'Data tidak ditemukan'];
        }

        // Update user point
        $user = User::find(auth()->user()->id);
        $user->point -= 1;
        $user->save();

        // Update flood status
        $impact = Impact::find($assistance->impact_id);
        if ($impact) {
            $impact->status = 0;
            $impact->save();
        }

        // Delete Image
        $image_path = public_path().'/assets/img/assistance/'.$assistance->image;
        if (file_exists($image_path)) {
            unlink($image_path); // Delete the image file
        }

        // Delete data
        Assistance::destroy($request->id);

        return ['status' => 'success', 'message' => 'Data berhasil dihapus'];
    }

}
