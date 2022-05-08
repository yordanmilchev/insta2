@extends('admin.layout')
@section('title','Profile')
@section('js')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script defer src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'base_url' => url('/'),
        ]); ?>
    </script>
@endsection
@section('content')
<div class="content-load">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Users" style="margin-bottom: 25px;">
    <div class="table-responsive" id="searchuser" style="display: none;">
        <p style="color: black;float: right;"><span id="total_records"></span> records</p>
        <ul id="listitem" style="list-style-type: none;"></ul>
    </div>
<div class="profile-bay">
    <div class="profile-bay-item1">
        @if(isset($LoggedUserInfo->profile_pic->image))
        <img src="{{ asset('uploads/profile_pic/'.$LoggedUserInfo->profile_pic->image)}}" alt="img">
        @endif
    </div>
    <div class="profile-bay-item2">
        <h2>{{$LoggedUserInfo -> name}}</h2>
    </div>
    <div class="profile-bay-item3" style="text-align: center;">
        <h4 style="cursor: pointer;">{{$LoggedUserInfo -> followers}}<br>Followers</h4>
    </div>
    <div class="profile-bay-item4" style="text-align: center;">
        <h4 style="cursor: pointer;">{{$LoggedUserInfo -> following}}<br>Following</h4>
    </div>
</div>
<br>
<div class="follow-area" style="display: none;">
    <ul id="listfitem" style="list-style-type: none;"></ul>
</div>
<br>
<div class="grid">
    @foreach($LoggedUserInfo->images as $item)
            <img src="{{ asset('uploads/images/'.$item->image) }}" alt="{{ $item->id}}" id="{{ $item->id}}">
    @endforeach
</div><br><br>
    <div class="pageload__contents">
        <div class="clicked-img"></div>
        <div class="profile-bay-item5">
            @if(isset($LoggedUserInfo->profile_pic->image))
            <img src="{{ asset('uploads/profile_pic/'.$LoggedUserInfo->profile_pic->image)}}" alt="img">
            @endif
            <h2>{{$LoggedUserInfo -> name}}</h2>
                <button type="button" id="btndelete" class="btn btn-danger" data-id="">Delete picture</button>
        <div class="description"></div>
        </div>
        <div class="comment-area">
        <input type="text" class="form-control" id="commentid" placeholder="Enter comment" >
        <button id="commentsend" class="btn btn-block btn-primary">Send</button>
        </div>
    </div>
</div>
    <script>
        $('#search').on('click', function () {
            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    method: "GET",
                    url: "{{ route('action') }}",
                    dataType: "json",
                    cache: false,
                    data: {query: query},
                    success: function (data) {
                        $('#listitem').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                });
            }

            $(document).on('keyup', '#search', function () {
                var query = $(this).val();
                fetch_customer_data(query);
            })
        })


        $('.profile-bay-item3').on('click', function () {
                $.ajax({
                    method: "GET",
                    url: "{{ url("/auth/followersrecords/0") }}",
                    dataType: "json",
                    cache: false,
                    data: {},
                    success: function (output) {
                        $('#listfitem').html(output);
                    }
                });
        })

        $('.profile-bay-item4').on('click', function (){
                $.ajax({
                    method: "GET",
                    url: "{{ url("/auth/followingrecords/0") }}",
                    dataType: "json",
                    cache: false,
                    data: {},
                    success: function (output) {
                        $('#listfitem').html(output);
                    }
                });
        })
    </script>
@endsection
