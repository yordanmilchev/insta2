@extends('admin.layout')
@section('title','Settings')
@section('js')
    <script type="text/javascript">
        function confirmMesage()
        {
            var delVal = confirm("Are you sure?");
            if (delVal == true)
            {
                val = "Deleted";
                let url = "{{ route('delete') }}";
                document.location.href=url;
            }
            else
            {
                val = "Canceled";
            }
            alert(val);
        }
    </script>
@endsection
@section('content')
            <table class="table table-sm">
                <tbody>
                <td><a href="{{ Route('changename') }}" style="color:white;">Change Name</a></td>
                <td><a href="{{ Route('changepass') }}" style="color:white;">Change Password</a></td>
                <td><button type="button" class="btn btn-danger" onclick="confirmMesage()">Delete account</button></td>
                </tbody>
            </table>
@endsection
