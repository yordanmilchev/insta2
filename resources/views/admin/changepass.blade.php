@extends('admin.layout')
@section('title','Change pass')
@section('js')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection
@section('content')
    <div class="flexbox-addimage">
        <div class="col-md-5 col-md-offset-3">
            <form action="{{ route('changepasspost') }}" method="post">
                @if(Session::get('success'))
                    <div id="status" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::get('fail'))
                    <div id="status" class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
            @csrf
            <div class="form-group">
                <label>New password</label>
                <input type="password" class="form-control" name="newpass" placeholder="Enter new password" >
                <span class="text-danger">@error('newpass'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label>Confirm new password</label>
                <input type="password" class="form-control" name="cnewpass" placeholder="Re-enter new password" >
                <span class="text-danger">@error('cnewpass'){{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Change</button>
                <br>
            </form>
        </div>
    </div>
    <script>
        setTimeout(function () {
            $('#status').fadeOut();
        },3000);
    </script>
@endsection
