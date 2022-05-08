@extends('admin.layoutnews')
@section('title','News')
@section('js')
    <link rel="stylesheet" href="{{ asset('css/styles_news.css') }}">
    <script defer src="{{ asset('js/script_news.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'base_url' => url('/'),
        ]); ?>
    </script>
@endsection
@section('content')
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Users" style="margin-bottom: 25px;">
    <div class="table-responsive" id="searchuser" style="display: none;">
        <p style="color: black;float: right;">Records: <span id="total_records"></span> </p>
        <ul id="listitem" style="list-style-type: none;"></ul>
    </div>
        <div class="grid-news">
            @foreach($image as $everyitem)
                @foreach($everyitem->news as $item)
                <div class="grid-item">
                    <img src="{{ asset('uploads/images/'.$item->image) }}" alt="{{ $item->id }}">
                    <h4 style="text-align: center;">{{$item->description}}</h4>
                </div>
                @endforeach
            @endforeach
            <div>
                <div class="pageload__contents">
                    <div class="clicked-img"></div>
                    <div class="profile-bay-item5">
                        <div class="user"><img id="userpic" src="" alt="img"></div>
                        <div class="description"></div>
                    </div>
                    <div class="comment-area">
                        <input type="text" class="form-control" id="commentid" placeholder="Enter comment" >
                        <button id="commentsend" class="btn btn-block btn-primary">Send</button>
                    </div>
                </div>
                <script>
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
                </script>
@endsection
