@extends('user.template_user')

@section('title')
	<title>Báo cáo doanh thu</title>
@stop
@section('main-content')
	<div id="tracuudk1">
            <form action="" method="post" class="form-horizontal" role="form" id="tttracuu">
                <div class="form-group">
                    <div class="row">
                        <label class="col-xs-4 text-right">Loại công tơ:</label>
                        <div class="col-xs-2">                        
                             <select class="form-control" id="loaict" name="loaict">
                                <option value="điện">Điện</option>
                                <option value="nước">Nước</option>
                            </select>
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
                        <button type="submit" class="btn btn-info" id="click" style="font-size: 13pt;">Xem báo cáo</button>
                    </div>
                </div>

                
            </form>
            <hr>
        <div id="hdon">
            
        </div>
	<div>
	<script type="text/javascript">
    $('#click').click(function(event) {
            /* Act on the event */
            var loai=document.getElementById('loaict').value;
            var tuthang = document.getElementById('tuthang').value;
            var denthang = document.getElementById('denthang').value;
            
            $.ajax({
             url: '<?php echo asset("user/baocaodoanhthu"); ?>',
             type: 'post',
             dataType: 'html',
             data: {param1: loai, param2: tuthang, param3 : denthang},
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

@stop