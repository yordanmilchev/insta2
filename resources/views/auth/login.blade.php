<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insta</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations_login.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>
<button type="button" class="btn btn-success" id="btn2" onclick="window.location='{{ Route("portfolio")}}'">Portfolio</button>
<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4">
            <div class="top-item1">
                <h4>Login  |  Insta</h4></div><hr>
            <form action="{{ route('auth.check') }}" method="post">
                @csrf
                @if(Session::get('goodbye'))
                    <div id="status" class="alert alert-info">
                        {{ Session::get('goodbye') }}
                    </div>
                @endif
                @if(Session::get('fail'))
                    <div id="status" class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                @if(Session::get('delete'))
                    <div id="status" class="alert alert-danger">
                        {{ Session::get('delete') }}
                    </div>
                @endif
                    <div class="nav">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                    </div>
                    <div class="bottom-item1">
                <button type="submit" class="btn btn-block btn-primary">Sign In</button>
                <br>
                <a href="{{route('auth.register')}}">I don't have an account, create new</a>
                    </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-warning" id="btn4" onclick="window.location='{{ Route("learningpage")}}'">Json fetch</button>
<script>
    setTimeout(function () {
        $('#status').fadeOut();
    },3000);
</script>
</body>
</html>
