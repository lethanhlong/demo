@extends('home.template')

@section('title')
    <title>Tra cứu hóa đơn điện nước</title>
@stop
@section('main-content')
    <div id="tracuudk">
        <div id="thongbao" class="alert-info">XEM HÓA ĐƠN ĐIỆN NƯỚC</div>
        
        
        <div id="tracuudk1">
            <form action="" method="post" class="form-horizontal" role="form" id="tttracuu">
                <div class="form-group">
                    <div class="row">
                        <label for="makh" class="col-sm-3 text-right">Mã khách hàng:</label>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <label class="sr-only" for=""></label>
                                <div class="input-group-addon">PB</div>
                                <input type="text" class="form-control" id="makh" name="makh" placeholder="Mã khách hàng">
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-xs-2 text-right">Tháng:</label>
                        <div class="col-xs-2">                        
                             <select class="form-control" id="tuthang" name="tuthang">
                                <option value="2014-01-15">1</option>
                                <option value="2014-02-15">2</option>
                                <option value="2014-03-15">3</option>
                                <option value="2014-04-15">4</option>
                                <option value="2014-05-15">5</option>
                                <option value="2014-06-15">6</option>
                                <option value="2014-07-15">7</option>
                                <option value="2014-08-15">8</option>
                                <option value="2014-09-15">9</option>
                                <option value="2014-10-15">10</option>
                                <option value="2014-11-15">11</option>
                                <option value="2014-12-15">12</option>
                            </select>
                        </div>
                        <label class="col-xs-2 text-right">Loại công tơ:</label>
                        <div class="col-xs-2">                        
                             <select class="form-control" id="loaict" name="loaict">
                                <option value="điện">Điện</option>
                                <option value="nước">Nước</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <button type="submit" class="btn btn-info" id="click" style="font-size: 13pt;">Xem hóa đơn</button>
                    </div> 
                    </div>            
                    
                </div>
                <div class="form-group">
                   Hướng dẫn:<br>
                   <p style="color:deeppink ;">
                    - Mã số khách hàng (MSKH) là dãy ký tự được đánh dấu ở hình bên dưới. Mã khách hàng gồm 13 kí tự và bắt đầu là PB.<br>
                    - Hệ thống chỉ thực thi đối với các khách hàng sử dụng điện tại các Công ty Điện lực Minh Long.
                    </p>
                </div> 
                
            </form>
        </div>
        <hr>
        <div id="hdon">
            
        </div>
        <div>
           @if (Session::has('global'))
                <p style="color:deeppink ;">{{ Session::get('global') }}</p>
            @endif
        </div>
        
    </div>
    <script type="text/javascript">
    $('#click').click(function(event) {
            /* Act on the event */
            var ma = document.getElementById('makh').value;
            var tuthang = document.getElementById('tuthang').value;
            var loai=document.getElementById('loaict').value;
            $.ajax({
             url: '<?php echo asset("home/tracuuhd"); ?>',
             type: 'post',
             dataType: 'html',
             data: {param1: ma, param2: tuthang, param3 : loai},
            })
            .done(function(data) {
             console.log(data);
             $('#hdon' ).html( data );
            })
            .fail(function() {
             console.log("error");
            })
            .always(function() {
             console.log("complete");
            });
            
            return false;
        });
     </script>
<script type="text/javascript">
    $(function() {
    $("#tttracuu").validate({
        rules:{
                makh:{
                    required:true,
                },
            },
        messages:{
                makh:{
                    required:"Xin vui lòng nhập vào mã khách hàng",             
                    },
                }
        })
    });
</script>
@stop