<!-- Jquery Core Js -->


<script src="{{ asset('assets/bundles/elearn-index.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script> -->
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
<!-- Plugin Js-->
<script src="{{ asset('assets/bundles/owl.carousel.min.js') }}"></script>
<!-- Jquery Page Js -->
<script src="{{ asset('assets/bundles/template.js') }}"></script>
<!-- toastr js -->
<script src="{{asset('assets/bundles/toastr.min.js')}}"></script>
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type', 'info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>

@stack('script')