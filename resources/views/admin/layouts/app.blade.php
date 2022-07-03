<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- css -->
    @include('admin.components.style')
</head>

<body >

    <div id="elearn-layout" class="theme-purple">
        <!-- sidebar -->
        @include('admin.components.sidebar')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            @include('admin.components.header')

            <!-- Body: Body -->
            @yield('content')


        </div>
    </div>

    <!-- script -->
    @include('admin.components.script')
</body>

</html>