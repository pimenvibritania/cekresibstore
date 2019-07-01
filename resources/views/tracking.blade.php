@extends('layouts.master')

@section('master')

<div class="container">
    <div class="lockscreen-logo py-5 " id="mb" >
        <div style="margin-top: 10% !important;">
            <a href="#" ><b>Billionaire</b>Store</a>
        </div>
    </div>
    <div class="lockscreen-item" id="lock">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
        <img src="{{ URL::asset('adminlte/img/user1-128x128.jpg')}}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="{{route('tracking')}}" method="GET">
        <div class="input-group">
        <input type="text" class="form-control" placeholder="Invoice..." name="cari" value="{{old('cari')}}">

        <div class="input-group-append">
            <button type="submit" value="CARI" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
        </div>
    </form>
    <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Silahkan Masukkan Invoice Anda
    </div>
</div>

</body>

	{{-- <form action="{{route('tracking')}}" method="GET">
    <div class="input-group input-group ">
        <input type="text" class="form-control" name="cari" placeholder="Cari Invoice..." value="{{old('cari')}}">
        <span class="input-group-append">
            <button type="submit"  value="CARI" class="btn btn-info btn-flat">Go!</button>
        </span>
    </div>
	</form> --}}
@endsection