<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/site-assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/site-assets/css/login.css">
    <link rel="stylesheet" href="/site-assets/css/sweetalert.css">

    <!-- App styles -->

    <script src="/site-assets/js/sweetalert.min.js"></script>
</head>
<body>
@if($errors->any())
    <script type="text/javascript">
        swal({
            title: 'پیام سیستم',
            text: "{{ $errors->first()  }}",
            type: 'error',
            showConfirmButton: true,
            timer: 5000
        });
    </script>
@endif
<div class="main">
    @yield('content')
</div>
<!-- JS -->
</body>
</html>