@extends('layouts.auth')

@section('content')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(/ceres-html-pro/assets/media/illustrations/dozzy-1/14.png">
  <!--begin::Content-->
  <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <!--begin::Wrapper-->
    <div class="col-md-7 bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
      <div class="row mb-10">
        <img alt="Logo" src="/assets/img/logo-dkzk.png" class="h-70px w-auto mx-auto" />
        {{-- <h1 class="text-center">Daikazoku</h1> --}}
      </div>
      <!--begin::Form-->
      <form method="post" class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="" method="post">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-10">
          <h1 class="text-dark mb-3">Registrasi Akun</h1>
        </div>
        <!--begin::Heading-->
        
        <div class="fv-row mb-10">
          <label class="form-label fs-6 fw-bolder text-dark">Nama</label>
          <input class="form-control form-control-lg form-control-solid" type="text" name="name" required/>
        </div>
        <div class="row">
          <div class="col-md-6 mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Username</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="username" required/>
          </div>
          <div class="col-md-6 mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" required/>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Password</label>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password" required/>
          </div>
          <div class="col-md-6 mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Tipe akun</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="type" required placeholder="Individu/komunitas"/>
          </div>
        </div>
        <div class="row mb-10">
          <div class="col-md-6 mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">Lokasi</label>
            <input class="form-control form-control-lg form-control-solid" type="text" name="location" required/>
          </div>
          <div class="col-md-6 mb-10">
            <label class="form-label fs-6 fw-bolder text-dark">No. telepon</label>
            <input class="form-control form-control-lg form-control-solid" type="number" name="phone" required/>
          </div>
        </div>
        
        <!--begin::Actions-->
        <div class="text-center">
          <!--begin::Submit button-->
          <button type="submit" id="kt_sign_in_submit" name="login" class="btn btn-lg btn-danger w-100 mb-5">
          <span class="indicator-label">Daftar</span>
          <span class="indicator-progress">Please wait... 
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
          <!--end::Submit button-->
        </div>
        <!--end::Actions-->
      </form>
      <!--end::Form-->
    </div>
    <!--end::Wrapper-->
  </div>
  <!--end::Content-->
  <!--begin::Footer-->
  <div class="d-flex flex-center flex-column-auto p-10">
    <!--begin::Links-->
    <div class="d-flex align-items-center fw-bold fs-6">
      <span>Developed by <a href="https://naufal.dev" class="text-muted text-hover-danger px-2">naufal.dev</a></span>
    </div>
    <!--end::Links-->
  </div>
  <!--end::Footer-->
</div>
@endsection