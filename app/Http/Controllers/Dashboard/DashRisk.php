<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Risk;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class DashRisk extends Controller
{
    public function index(){
        return view('dashboard.risk',[
            "title" => "Dashboard | Lapor daerah rawan banjir",
            "cities" => City::whereNotNull('latitude')->orderBy('name', 'ASC')->get(),
            "risks" => Risk::whereUserId(auth()->user()->id)->orderBy("id","DESC")->get(),
        ]);
    }

    public function postHandler(Request $request){
        if($request->submit=="store"){
            $res = $this->store($request);
            return back()->with($res['status'],$res['message']);
        }
        if($request->submit=="update"){
            $res = $this->update($request);
            return back()->with($res['status'],$res['message']);
        }
        if($request->submit=="destroy"){
            $res = $this->destroy($request);
            return back()->with($res['status'],$res['message']);
        }
        else{
            return back()->with("info","Submit not found");
        }
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'city_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'area'=>'required',
            'date'=>'required',
            'image' => 'required|image|file|max:1024',
        ]);
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
        $imageWebp->save('assets/img/risk/'.$validatedData['image']);

        Risk::create($validatedData);
        return ['status'=>'success','message'=>'Laporan berhasil ditambahkan'];
    }

    public function update(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
            'city_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'area'=>'required',
            'date'=>'required',
            'image' => 'image|file|max:1024',
        ]);
        
        $risk = Risk::find($request->id);

        //Check if the data is found
        if(!$risk){
            return ['status'=>'error','message'=>'Laporan tidak ditemukan'];
        }

        //Check if has image
        if($request->file('image')){

            // Delete old image
            $image_path = public_path().'/assets/img/risk/'.$risk->image;
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the image file
            }
            
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
            $validatedData['image'] = $validatedData['id'].'-'.time().".webp";
            $imageWebp->save('assets/img/risk/'.$validatedData['image']);
            
            $risk->update($validatedData);
            return ['status'=>'success','message'=>'Laporan berhasil diupdate'];
            
        }else{
            // Update data
            $risk->update($validatedData);    
            return ['status'=>'success','message'=>'Laporan berhasil diedit'];
        }
        
    }

    public function destroy(Request $request){
        
        $validatedData = $request->validate([
            'id'=>'required|numeric',
        ]);

        $risk = Risk::find($request->id);

        // Check if the data is found
        if (!$risk) {
            return ['status' => 'error', 'message' => 'Laporan tidak ditemukan'];
        }

        $image_path = public_path().'/assets/img/risk/'.$risk->image;

        // Check if the image file exists before attempting to delete it
        if (file_exists($image_path)) {
            unlink($image_path); // Delete the image file
        }

        Risk::destroy($request->id);
        return ['status' => 'success', 'message' => 'Laporan berhasil dihapus'];
    }

}
