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
		
		<!-- jQuery -->
		<script src="{{asset('bootstrap/js/jquery-2.1.0.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-2.1.0.min.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-ui.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery-ui.min.js')}}"></script>
 	   <!-- jquery validate -->
 	    <script src="{{asset('bootstrap/js/jquery.validate.js')}}"></script>
		<script src="{{asset('bootstrap/js/jquery.validate.min.js')}}"></script>

		<script type="text/javascript">
		$(document).ready(function() {
			$('.img-switcher img:not(:first)').hide();
			$('.img-switcher img:first').addClass('current');
			var t =setInterval(switcher,2000);
			function switcher () {
				var $cur =$('img.current');
				var $next=$cur.next('img');

				if ($next.length ==0){
					$next =$('.img-switcher img:first');
				}
				$cur.removeClass('current').fadeOut(400);
				$next.addClass('current').fadeIn(400);

			}
			$('.img-switcher').hover(function() {
				clearInterval(t);
			}, function() {
				setInterval(t);
			});
		});
		</script>
		<!-- Bootstrap JavaScript -->
		<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

		<section id="title">
			@yield('title')
		</section>

	</head>
	<body>
		<div class="container">
		<div class="header">
			<div class="row">
			  	<div class="col-md-4">
			  		<div id="ad1">
						<a href="{{asset('home/home')}}"><img src="{{asset('images/logo_evn.jpg')}}" alt="" width="349px" height="204px" ></a>
				 	</div>
			  	</div>
			  	<div class="col-md-8">
			  		<div id="wrapper">
						<div class="img-switcher">
							<img src="{{asset('images/1.png')}}" atl="cham soc" width="749px" height="204px">
							<img src="{{asset('images/2.png')}}" atl="cham soc">
							<img src="{{asset('images/3.png')}}" atl="cham soc">
							<img src="{{asset('images/4.png')}}" atl="cham soc">
							<img src="{{asset('images/5.png')}}" atl="cham soc">
						</div>
					</div><!-- end wrapper -->
  				</div>
  			</div>
  			<div><!-- bat dau navbar -->
				<ul class="nav nav-pills" id="long">
				    <li class=""><a href="{{asset('home/home')}}"><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
				    <li><a href="{{asset('home/gioithieu')}}">Giới thiệu</a></li>
				    <li class="dropdown">
				        <a href="" data-toggle="dropdown" class="dropdown-toggle">
				            Tin tức <!-- <span class="caret"></span> -->
				        </a>
				        <ul class="dropdown-menu" id="long1">
				            <li><a href="{{asset('home/tintuc')}}">Tin tức - sự kiện</a></li>
				            <li class="divider"></li>
				            <li><a href="{{asset('home/tinnganhdien')}}">Tin ngành điện</a></li>
				            
				        </ul>
				    </li>	 
					 <li class="dropdown">
				        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
				            Hỗ trợ khách hàng <!-- <span class="caret"></span> -->
				        </a>
				        <ul class="dropdown-menu" id="long1">
				            <li><a href="{{asset('home/dangkymuadien')}}">Đăng ký mua điện - nước</a></li>
				            <li><a href="{{asset('home/tracuunokh')}}">Tra cứu nợ khách hàng</a></li>
				            <li><a href="{{asset('home/dangkygiaybao')}}">Đăng ký nhận giấy báo qua Email</a></li>
				            <li><a href="{{asset('home/tracuudangky')}}">Tra cứu đăng ký mua điện - nước</a></li>
				            <li><a href="{{asset('home/lichcupdien')}}">Lịch ngừng cung cấp điện</a></li>
				            <li class="divider"></li>
				            <li>
				                <!--this link works-->
				                <a href="{{asset('home/tracuuhd')}}">Xem và nhận hóa đơn điện tử</a></li>
				        </ul>
				    </li>
				    <li class="dropdown">
				        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
				            Giá điện nước <!-- <span class="caret"></span> -->
				        </a>
				        <ul class="dropdown-menu" id="long1">
				            <li><a href="{{asset('home/giadien')}}">Giá điện</a></li>
				            <li class="divider"></li>
				            <li><a href="{{asset('home/gianuoc')}}">Giá nước</a></li>
				            
				        </ul>
				    </li>
				    <li><a href="#">Trợ giúp</a></li>
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
				<div class="col-md-3" ><!-- menu trái -->
				  	<div id="long2"> <!-- thanh chuyên mục -->
						<ul class="nav nav-pills nav-stacked" >
						   <li id="ad3" class="disabled"><span>CHUYÊN MỤC</span></li>
						   <li ><a href="{{asset('home/antoandien')}}"><span>An toàn tiết kiệm điện nước</span></a>
						      
						   </li>
						   <li><a href="#"><span>Thông tin giá điện nước </span></a>
						   </li>
						   <li><a href="{{asset('home/lienhe')}}"><span>Thông tin liên lạc </span></a></li>
						   <li class="last"><a href="#"><span>Tra cứu hóa đơn điện tử</span></a></li>
						</ul>
					</div><!-- kết thúc chuyên mục -->
					<hr>
					<div id="long3"><!-- banner quang cao -->
						<div id="ad3" class="disabled"><span>CON ĐƯỜNG ÁNH SÁNG</span>
						</div>
						<img src="{{asset('images/bannerdung.jpg')}}" alt="Con đường ánh sáng" width="100%">
					</div>
					<hr>
					<div id="long4"><!-- banner quang cao -->
						<div id="ad4" class="disabled"><span>HỖ TRỢ KHÁCH HÀNG</span>
						</div>
						<img src="{{asset('images/hotro.gif')}}" alt="Hỗ trợ khách hàng" width="80%">
					</div>
				</div>

				 <div class="col-md-9" id="col9">
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
			$('.nav a').click(function (e) {
		     // e.preventDefault();
		    $(this).tab('show');
		   })
		</script>
	</body>
</html>