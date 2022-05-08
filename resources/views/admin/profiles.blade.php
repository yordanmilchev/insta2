@extends('admin.layout')
@section('title','Profile')
@section('js')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script defer src="{{ asset('js/script_profiles.js') }}"></script>
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
                @if(isset($UserInfo->profile_pic->image))
                    <img src="{{ asset('uploads/profile_pic/'.$UserInfo->profile_pic->image)}}">
                @endif
            </div>
            <div class="profile-bay-item2">
                @php($i=0)
                @foreach($LoggedUserInfo->follows as $item)
                @if($item->follow==$UserInfo->id)
                    @php($i++)
                       @endif
                @endforeach
                @if($i)
                <h2>{{$UserInfo->name}}<button type="button" class="btn btn-info" style="float: right;margin-left: 10px;" id="unfollowbutton">Unfollow</button></h2>
                @else
                <h2>{{$UserInfo->name}}<button type="button" class="btn btn-primary" style="float: right;margin-left: 10px;" id="followbutton">Follow</button></h2>
                @endif
            </div>
            <div class="profile-bay-item3" style="text-align: center;">
                <h4 style="cursor: pointer;">{{$UserInfo->followers}}<br>Followers</h4>
            </div>
            <div class="profile-bay-item4" style="text-align: center;">
                <h4 style="cursor: pointer;">{{$UserInfo->following}}<br>Following</h4>
            </div>
        </div>
        <br>
        <div class="follow-area" style="display: none;">
            <ul id="listfitem" style="list-style-type: none;"></ul>
        </div>
        <br>
        <div class="grid">
            @foreach($UserInfo->images as $item)
                <img src="{{ asset('uploads/images/'.$item->image) }}" alt="{{ $item->description}}" id="{{ $item->id}}">
            @endforeach
        </div><br><br>
        <div class="pageload__contents">
            <div class="clicked-img"></div>
            <div class="profile-bay-item5">
                @if(isset($UserInfo->profile_pic->image))
                    <img src="{{ asset('uploads/profile_pic/'.$UserInfo->profile_pic->image)}}">
                @endif
                <h2>{{$UserInfo -> name}}</h2>
                <div><h4 id="description"></h4></div>
            </div>
            <div class="comment-area">
                <input type="text" class="form-control" id="commentid" placeholder="Enter comment" >
                <button id="commentsend" class="btn btn-block btn-primary">Send</button>

            </div>
        </div>
    </div>
    <script>
        $('body').on('click', '#unfollowbutton', function () {
            var unfollowbtn = $('#unfollowbutton');
                $.ajax({
                    method: "GET",
                    url: "{{ url("/auth/unfollow/".$UserInfo->id)}}",
                    dataType: "json",
                    cache: false,
                    data: {},
                    success: function (response) {
                        unfollowbtn.text('Follow');
                        unfollowbtn.attr('id', 'followbutton');
                        $('.profile-bay-item3').html(response.followers);
                    }
                });
        })

        $('body').on('click', '#followbutton', function () {
            var followbtn = $('#followbutton');
                $.ajax({
                    method: "GET",
                    url: "{{ url("/auth/follow/".$UserInfo->id)}}",
                    dataType: "json",
                    cache: false,
                    data: {},
                    success: function (response) {
                        followbtn.text('Unfollow');
                        followbtn.attr('id', 'unfollowbutton')
                        $('.profile-bay-item3').html(response.followers);
                    }
                });
        })

        $('#search').on('click', function (){
            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    method: "GET",
                    url: "{{ route('action') }}",
                    dataType: "json",
                    cache: false,
                    data: {query:query},
                    success: function (data) {
                        $('#listitem').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                });
            }

            $(document).on('keyup', '#search', function() {
                var query = $(this).val();
                fetch_customer_data(query);
            })
        })

        $('.profile-bay-item3').on('click', function () {

                $.ajax({
                    method: "GET",
                    url: "{{ url("/auth/followersrecords/".$UserInfo->id) }}",
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
                    url: "{{ url("/auth/followingrecords/".$UserInfo->id) }}",
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
