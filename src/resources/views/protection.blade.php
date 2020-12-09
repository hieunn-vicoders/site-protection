<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}">
    <title>Đăng nhập nội bộ</title>
</head>

<body>
    <div class="background-form-site-protection">
        <div class="form-site-protection">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if (Session::has('errors'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::get('errors') }}</li>
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('site.protection')}}" method="POST">
                            <legend>Đăng nhập nội bộ </legend>
                            @csrf
                            <div class="form-group">
                                <label for="account">Tài khoản:</label>
                                <input type="text" class="form-control" name="account">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label for="route">current_route:</label>
                                <input type="text" class="form-control" name="route" value='{{$current_route}}'>
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
