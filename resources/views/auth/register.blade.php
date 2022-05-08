<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations_login.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>
<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4">
            <div class="top-item1">
                <h4>Register  |  Insta</h4>
            </div>
            <hr>
            <form action="{{ route('auth.save') }}" method="post">
                @csrf
                @if(Session::get('success'))
                    <div id="status" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                    <div class="nav">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
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
                <a href="{{route('auth.login')}}">I already have an account, sign in</a>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    setTimeout(function () {
        $('#status').fadeOut();
    },3000);
</script>
</html>
