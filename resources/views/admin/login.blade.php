<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Pertemuan Home</title>

    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/assets/admin/css/animate.css" rel="stylesheet">
    <link href="/assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6" align="center">
                <img style="width: 150px; height: 150px;" src="">
                <h2 class="font-bold">Hana Master Admin</h2>
            </div>
            <div class="col-md-6">
                
                <div class="ibox-content">
                    <form method="post" action="{{ url('/admin/login') }}">
                        @csrf
                        <h3 align="center;" style="text-align: center;">Login Page</h3>
                        <hr>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg block full-width m-b">Login</button>
                    </form>
                    @if(\Session::has('alert'))
                        <div class="row">
                            <div style="text-align:center;" class="alert alert-danger">
                                {{Session::get('alert')}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6" align="center">
                Copyright  © PT. Hana Master Jaya 2020
            </div>
        </div>
    </div>

</body>

</html>
