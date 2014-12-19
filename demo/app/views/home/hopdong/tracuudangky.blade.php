@extends('home.template')

@section('title')
    <title>Tra cứu khách hàng đăng ký sử dụng điện nước</title>
@stop
@section('main-content')
    <div id="tracuudk">
        <div id="thongbao" class="alert-info">TRA CỨU KHÁCH HÀNG ĐĂNG KÝ SỬ DỤNG ĐIỆN NƯỚC</div>
        <div id="tracuudk1">
            <form action="" method="post" class="form-horizontal" role="form" id="tttracuu">
                <div class="form-group">
                    <legend class="text-center">Khách hàng vui lòng nhập vào chứng minh nhân dân mà khách hàng đã đăng ký</legend>
                </div>
                <div class="form-group">
                    <label for="cmt" class="col-sm-4 control-label">Chứng minh nhân dân:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cmt" name="cmt" placeholder="Vui lòng nhập CMND">
                        @if ($errors->has('cmt'))
                            {{ $errors->first('cmt') }}
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-info" id="click" >Submit</button>
                    </div>
                </div> 
                
            </form>
        </div>
        
        <div class="alert" >
           @if (Session::has('global'))
                <p style="color:deeppink ;">{{ Session::get('global') }}</p>
            @endif
        </div>
       
    </div>
<script type="text/javascript">
    $(function() {
    $("#tttracuu").validate({
        rules:{
                cmt:{
                    required:true,
                },
            },
        messages:{
                cmt:{
                    required:"Xin vui lòng nhập vào CMND",             
                    },
                }
        })
    });
</script>
@stop