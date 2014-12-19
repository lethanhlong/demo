<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="{{asset('images/favicon22.ico')}}">
		<!-- Bootstrap CSS -->
		<link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/bootstrap-theme.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery-ui.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery-ui.min.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery.ui.theme.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/nav.css')}}" rel="stylesheet">
		<link href="{{asset('bootstrap/css/jquery.dataTables.css')}}" rel="stylesheet">
		{{HTML::style('bootstrap/css/user.css')}}
		
		
		<!-- jQuery -->
		<script src="{{asset('bootstrap/js/jquery-2.1.0.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-2.1.0.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-ui.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-ui.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.dataTables.min.js')}}"></script>
 	   <!-- jquery validate -->
 	    <script src="{{asset('bootstrap/js/jquery.validate.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.validate.min.js')}}"></script>

		
		<!-- Bootstrap JavaScript -->
		<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

		<section id="title">
			@yield('title')
		</section>

	</head>
	<body>
		<div class="container-fluid">
		<div class="header">
			
  			<div><!-- bat dau navbar -->
				<ul class="nav nav-pills" id="long">
				    <li class=""><a href="{{asset('user/home')}}"><span class="glyphicon glyphicon-home"></span></a></li>
				    <li class="dropdown">
				        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
				            Cập nhật thông tin <!-- <span class="caret"></span> -->
				        </a>
				        <ul class="dropdown-menu" id="long1">
				            <li><a href="{{asset('user/lichngatdien')}}">Cập nhật lịch ngắt điện</a></li>
				             <li class="divider"></li>
				            <li><a href="{{asset('user/cnhopdong')}}">Cập nhật hợp đồng</a></li>
				            <li class="divider"></li>
				            <li><a href="{{asset('user/ghihoadondien')}}">Ghi nợ hóa đơn</a></li>
				            <li class="divider"></li>
				            <li><a href="{{asset('user/xoanohoadon')}}">Xóa nợ hóa đơn</a></li>
				        </ul>
				    </li>
				   
				    <li class="dropdown">
				        <a href="" data-toggle="dropdown" class="dropdown-toggle">
				            Ghi chỉ số <!-- <span class="caret"></span> -->
				        </a>
				        <ul class="dropdown-menu" id="long1">
				            <li><a href="{{asset('user/ghichisodien')}}">Ghi chỉ số điện</a></li>
				            <li class="divider"></li>
				            <li><a href="{{asset('user/ghichisonuoc')}}">Ghi chỉ số nước</a></li>
				            
				        </ul>
				    </li>
				   	
				   	<li class="dropdown">
				        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
				            Giá điện nước <!-- <span class="caret"></span> -->
				        </a>
				        <ul class="dropdown-menu" id="long1">
				            <li><a href="{{asset('user/dongiadien')}}">Giá điện</a></li>
				            <li class="divider"></li>
				            <li><a href="{{asset('user/dongianuoc')}}">Giá nước</a></li>
				            
				        </ul>
				    </li>
				    <li class="dropdown">
				        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
				            Báo cáo - thống kê <!-- <span class="caret"></span> -->
				        </a>
				        <ul class="dropdown-menu" id="long1">
				            <li><a href="{{asset('user/baocaodoanhthu')}}">Báo cáo doanh thu</a></li>
				            <li class="divider"></li>
				            <li><a href="{{asset('user/baocaonohdon')}}">Báo cáo công nợ</a></li>
				            
				        </ul>
				    </li>				   
					<li><a href="{{asset('home/lienhe')}}">Liên hệ</a></li>
					  
				</ul>
			</div><!-- ket thuc navbar -->
		</div><!--end header-->

		</div><!-- end container -->
		<div class="container"> <!-- bắt đầu nội dung trang web -->
			<div class="row" id="ad2">
				<div class="col-md-3" > 
				  	<div id="clock" class="text-right"></div><!--  hiển thị ngày giờ -->
				</div>
				 <div class="col-md-9">
				 	<span><marquee style=" color:red;" onmouseover="stop()" onmouseout="start()"scrollamount="5" scrolldelay="120">Hệ thống hỗ trợ khách hàng | Xem và nhận hóa đơn điện tử | Hỗ trợ thanh toán trực tuyến</marquee></span>
				</div>
			</div>
			<div class="row">
				

				 <div class="col-md-12">
				 	<div id="noidung">
				 		
				 		<section >
							@yield('main-content')
						</section>
				 	</div>
				 	
				</div>
				
			</div>
			<hr>
		</div> <!-- kết thúc nội dung -->

		<div id="footer"> <!-- footer -->
	      <div class="container">
	        <p class="text-muted">Copyright © 2014 Bản quyền thuộc về Lê Thành Long<br>
	        	Email: long117804@student.ctu.edu.vn Điện thoại: 01263993304</p>
	      </div>
	    </div>
				<!-- 	hien thi thu, ngay gio hien tai  -->
		 <script type="text/javascript">
		function refrClock() {
			var d=new Date();
			var s=d.getSeconds();
			var m=d.getMinutes();
			var h=d.getHours();
			var day=d.getDay();
			var date=d.getDate();
			var month=d.getMonth();
			var year=d.getFullYear();
			var days=new Array("Chủ nhật","Thứ hai","Thứ Ba","Thứ Tư","Thứ Năm","Thứ Sáu","Thứ Bảy");
			var months=new Array("1","2","3","4","5","6","7","8","9","10","11","12"); var am_pm;
			if (s<10) {s="0" + s}
			if (m<10) {m="0" + m}
			if (h>12)
			{h-=12;AM_PM = "PM"}
			else {AM_PM="AM"}
			if (h<10) {h="0" + h}
			document.getElementById("clock").innerHTML=days[day] +","+" " + date  + "-" +months[month] + "-" + year +" " + h + ":" + m + ":" + s; setTimeout("refrClock()",1000); } refrClock(); 
		</script>

		<!-- Xử lý nút lên đầu trang -->
		<script type="text/javascript">
		    	$(function(){
			        $('body').append('<div id="top"><img src="{{asset('images/top.jpg')}}" alt="Lên đầu"></span></div>');
			        $(window).scroll(function(){
			            var $toa_do=$(window).scrollTop();
			           
			            if($toa_do==0){
			                $('#top').fadeOut();
			            }else {$('#top').fadeIn()} ;
			        });
			        $('#top').click(function(){
			            $('html,body').animate({scrollTop:0},500);
			        });
		    	});

    </script> <!-- kết thúc nút lên đầu trang -->



		<script type="text/javascript">
			// $('.nav a').click(function (e) {
			// 	$('ul.tabs li.active').removeClass('active');
			// 	$(this).addClass('active');
		 //     // e.preventDefault();
		 //    $(this).tab('show');
		 //   });
			$('ul.tabs').on( 'click', 'li', function () {
		$('ul.tabs li.active').removeClass('active');
		$(this).addClass('active');

		$('div.tabs>div')
			.css('display', 'none')
			.eq( $(this).index() ).css('display', 'block');
	} );
	$('ul.tabs li.active').click();
		</script>
	</body>
</html>