@extends('admin.layouts.main')
@section('content')
    <script>
        function adjustFrameSize()
        {
            var frm = document.getElementById("myiframe");
            var h = document.documentElement.clientHeight || document.body.clientHeight;
            frm.style.height = h+"px";
        }
    </script>
    <section class="content">

        <iframe id="myiframe" onload="adjustFrameSize()" style="width:100%;padding-bottom: 180px;"  frameborder="0"  src="{{$url}}/payquota/type?sign_key={{$sign_key}}"></iframe>
    </section><!-- /.content -->
@endsection
