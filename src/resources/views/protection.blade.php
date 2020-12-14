<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet preload" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet preload" type="text/css" href="{{url('/css/app.css')}}">
    <title>Đăng nhập nội bộ</title>
</head>

<body class="protection">
    <div class="background-form-site-protection">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo-info-company animate__animated  animate__fadeInLeft">
                        <div class="row">
                            <div class="logo-company">
                                <img width="50%"
                                    src="https://cdn.zeplin.io/5d8877494f3ff161cea03412/assets/deda1902-7457-4262-8741-86eb9a0b2157.png">
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="info-company">
                                <p>Công Ty Truyền Thông Đa Phương Tiện Việt Nam - VMMS</p>
                                <p>Địa chỉ: Tầng 3, số 14 Pháo Đài Láng, Q.Đống Đa, TP.Hà Nội </p>
                                <p>Tư vấn 24/7: 0982 180 180</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate__animated animate__fadeInRight">
                    @if (session('errors'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{session('errors')}}</strong>
                    </div>
                    @endif
                    <form action="{{route('site.protection')}}" method="POST">
                        <legend>
                            <h1> <b>Đăng nhập nội bộ</b></h1>
                        </legend>
                        <br>
                        @csrf
                        <div class="form-group">
                            <label for="account">Tài khoản:</label>
                            <input type="text" class="form-control" required name="account"
                                oninvalid="this.setCustomValidity('Vui lòng nhập tài khoản')">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu:</label>
                            <input type="password" class="form-control" required name="password"
                                oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')">
                        </div>
                        <div class="form-group" hidden>
                            <input type="text" class="form-control" name="route"
                                value='{{$current_route}}'>
                        </div>
                        <button type="submit" class="btn btn-success">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
