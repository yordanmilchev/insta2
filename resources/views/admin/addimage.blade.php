@extends('admin.layout')
@section('title','Add Image')
@section('js')
    <link rel="stylesheet" href="{{ asset('css/styles_addimage.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection
@section('content')
<div class="flexbox-addimage">
    <div class="flexbox-addimage_item">
                <div class="card-header">
                    <h4>Add image with description</h4>
                </div>
                <div class="card-body">
                    <form action="{{ Route('image_save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(Session::get('status'))
                            <div id="status" class="alert alert-success">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Tell your story">
                            <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Image</button>
                        </div>
                    </form>
    </div>
</div>

    <div class="flexbox-addimage_item">
                <div class="card-header">
                    <h4>Add profile image</h4>
                </div>
                <div class="card-body">
                    <form action="{{ Route('profile_pic_save') }}" method="post" enctype="multipart/form-data">
                        @if(Session::get('status_pic'))
                            <div id="status" class="alert alert-success">
                                {{ Session::get('status_pic') }}
                            </div>
                        @endif
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="profile_image" class="form-control">
                            <span class="text-danger">@error('profile_image'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Profile Image</button>
                        </div>
                    </form>
                </div>
    </div>
</div>
<script>
    setTimeout(function () {
        $('#status').fadeOut();
    },3000);
</script>
@endsection

