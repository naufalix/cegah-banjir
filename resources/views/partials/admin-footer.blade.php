@php
  $appName = App\Models\Meta::getDataMeta()['app_name'] ?? 'Cegah Banjir';
@endphp

<div class="py-4 d-flex flex-lg-column py-6" id="kt_footer">
  <!--begin::Container-->
  <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
    <!--begin::Copyright-->
    <div class="text-dark order-2 order-md-1">
      <span class="text-muted fw-bold me-1">© {{ date('Y') }}</span>
      <a href="#" target="_blank" class="text-gray-800 text-hover-primary">{{ $appName }}</a>
    </div>
    <!--end::Copyright-->
  </div>
  <!--end::Container-->
</div>