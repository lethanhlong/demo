@extends('home.template')

@section('title')
    <title>Đăng ký nhận giấy báo qua email</title>
@stop
@section('main-content')
    <div id="tracuudk">
        <div id="thongbao" class="alert-info">TRA CỨU KHÁCH HÀNG SỬ DỤNG ĐIỆN NƯỚC</div>
        <div id="tracuudk1">
            <form action="" method="post" class="form-horizontal" role="form" >
                <div class="form-group">
                    <legend class="text-center">Khách hàng vui chọn loại đăng ký và email vào ô bên dưới</legend>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <select name="tenloai" id="tenloai" class="form-control">
                            <?php $htsd = DB::table('loaihinhthucs')->select('tenloai')->get();?>
                            @foreach ($htsd as $k) 
                                <option>{{$k->tenloai}}</option>
                            @endforeach
                             <!-- <option value="Điện">Điện</option>
                              <option value="Nước">Nước</option> -->
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label for="email">Email:</label>
                    </div>  
                    <div class="col-sm-5">
                      
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập vào Email">
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-info" id="click" >Submit</button>
                    </div>
                </div> 
                
            </form>
        </div>
        <div id="demo">
         @if (Session::has('global'))
                <p style="color:deeppink ;">{{ Session::get('global') }}</p>
        @endif
        </div>
    </div>
@stop