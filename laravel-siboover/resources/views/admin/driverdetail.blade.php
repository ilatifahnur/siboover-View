@extends('template.admin')

@section('title', 'Driver Detail')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="{{ URL::to('bookingdetails') }} " class="breadcrumb">YOUR BOOKING</a>
            <a href="{{ URL::to('pickdriver') }}" class="breadcrumb">PICK DRIVER</a>
            <a href="{{ URL::to('/driverdetail', $success) }} " class="breadcrumb">DRIVER DETAIL</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s3">
        <img src="{{ asset('avatar.png') }} " style="width: 200px; height: 200px;">
    </div>
    <div class="col s3">
        <p>Nama</p>
        <p>Nomor Handphone</p>
        <p>Email</p>
        <p>Rating</p>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s2">
        <p>Review:</p>
        <?php
            if(!empty($success)){
                $pickDriver = DB::table('booking')->where("username_driver", "=", $success)->get();
                foreach ($pickDriver as $dataBooking) {
                    $komentar = DB::table('review')->where("id_booking", "=", $dataBooking->id_booking)->get(); 
                    foreach ($komentar as $review) {
                        echo "<p>".$review->comment."</p>";
                        echo "<p class='right-align'>-".$dataBooking->username_customer."</p>";
                    }
                }
            }
            else{
                redirect("pickdriver");
            }
        ?>
        
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s2 center-align">
        <form method = 'post' action = {{ url('createBooking') }} >
            <input type="hidden" name = "driver" value = "{{ $success }}">
            <button class="btn waves-effect waves-light" type="submit" name="action">Konfirmasi Booking</button>
        </form>
    </div>
</div>
@endsection