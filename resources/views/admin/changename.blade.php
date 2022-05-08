@extends('admin.layout')
@section('title','Change name')
@section('js')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection
@section('content')
            <div class="col-md-5 col-md-offset-3">
                <form action="{{ route('changenamepost') }}" method="post">
                    @csrf
                    @if(Session::get('status'))
                        <div id="status" class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label>New name</label>
                        <input type="text" class="form-control" name="newname" placeholder="Enter your new name" >
                        <span class="text-danger">@error('newname'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Change</button>
                    <br>
                </form>
            </div>
    <script>
        setTimeout(function () {
            $('#status').fadeOut();
        },3000);
    </script>
@endsection
