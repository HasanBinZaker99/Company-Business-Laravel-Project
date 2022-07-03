<title>@yield('title')</title>
<link rel="icon" href="{{ asset('assets/images/kaizen/favicon.png') }}" type="image/x-icon">
<!-- plugin css file  -->
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
<!-- project css file  -->
<link rel="stylesheet" href="{{ asset('assets/css/e-learn.style.min.css') }}">
<!-- Toastr CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}" type="text/css">

<!-- <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}" type="text/css"> -->



@stack('css')