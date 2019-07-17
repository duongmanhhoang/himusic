<script src="{{asset('admin/metronic/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/metronic/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/metronic/demo/default/custom/crud/metronic-datatable/base/html-table.js')}}"></script>
<script src="{{asset('admin/metronic/demo/default/custom/components/base/sweetalert2.js')}}"></script>
<script src="{{asset('admin/metronic/demo/default/custom/crud/forms/widgets/summernote.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('admin/metronic/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
<script src="{{asset('admin/metronic/demo/default/custom/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Snippets -->
<script src="{{ asset('admin/metronic/app/js/dashboard.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('script')

