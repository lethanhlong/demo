@extends('home.template')

@section('title')
    <title>Tra cứu nợ khách hàng</title>
@stop
@section('main-content')
    <div id="tracuudk">
        <div id="thongbao" class="alert-info">TRA CỨU NỢ KHÁCH HÀNG SỬ DỤNG ĐIỆN NƯỚC</div>
        <div id="nokh" >
            
        </div>
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
                        <label class="col-xs-2 text-right">Từ tháng:</label>
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
                        <label class="col-xs-2 text-right">Đến tháng:</label>
                        <div class="col-xs-2">                        
                             <select class="form-control" id="denthang" name="denthang">
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
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <button type="submit" class="btn btn-info" id="click" style="font-size: 13pt;">Tra cứu</button>
                    </div> 
                    </div>            
                    
                </div>
                <div class="form-group">
                   Hướng dẫn:<br>
                   <p style="color:deeppink ;">
                    - Mã số khách hàng (MSKH) là dãy ký tự được đánh dấu ở hình bên dưới. Mã khách hàng gồm 13 kí tự và bắt đầu là PB.<br>
                    - Hệ thống chỉ thực thi đối với các khách hàng sử dụng điện tại  Công ty Điện Nước.
                    </p>
                </div> 
                
            </form>
        </div>
        
        <div>
           @if (Session::has('global'))
                <p style="color:deeppink ;">{{ Session::get('global') }}</p>
            @endif
        </div>
        <hr>
        
        <div >
            <img src="{{asset('images/giaybao.jpg')}}">
        </div>
    </div>
    <script type="text/javascript">
        $('#click').click(function(event) {
            /* Act on the event */
            var user_name=document.getElementById('makh').value;
            var tuthang=document.getElementById('tuthang').value;
            var denthang=document.getElementById('denthang').value;
            $.ajax({
             url: '<?php echo asset("home/tracuunokh"); ?>',
             type: 'post',
             dataType: 'html',
             data: {param1: user_name, param2:tuthang, param3:denthang},
            })
            .done(function(data) {
             console.log(data);
             $('#nokh' ).html( data );
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