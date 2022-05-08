<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('js')
</head>
<body>
        <div id="page-container" class="col-md-5 col-md-offset-3">
            <div class="content-page-default">
            <h4>@yield('title')</h4>
            <table class="table">
                <tbody>
                <td><a href="/admin/profile" style="color: white;">{{ $LoggedUserInfo->name }}</a></td>
                <td>{{ $LoggedUserInfo->email }}</td>
                <td><a href="{{ Route('auth.logout') }}">Logout</a></td>
                </tbody>
            </table>
            </div>
            <div class="content-load">
                @yield('content')
            </div>
            <div id="bottom" class="content-page-default">
            <ul style="list-style-type: circle;">
                <li><a href="/admin/profile">Profile</a></li>
                <li><a href="/admin/settings">Settings</a></li>
                <li><a href="/admin/addimage">Add Image</a></li>
                <li><a href="/admin/news">News</a></li>
                <li><a href="/admin/test">Test</a></li>
            </ul>
                <div class="footer">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-youtube" style="margin-right: 15px"></a>
                YM© 2021
                </div>
            </div>
        </div>
</body>
</html>
