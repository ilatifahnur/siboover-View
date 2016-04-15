@extends('template.driver')

@section('title', 'Booking Details')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('bookinglist');?>" class="breadcrumb">BOOKING LIST</a>
            <a href="{{ URL::to('/bookingdetails', $success) }} " class="breadcrumb">BOOKING DETAILS</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="row col s4 offset-s2">
        <p>Hari, dd Month yyyy</p>
    </div>
</div>
<div class="row">
    <div class="align-center col s6 offset-s3">
        <table>
            <tbody>
                <tr>
                    <td>Waktu</td>
                    <td>hh:mm</td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>Tujuan</td>
                </tr>
                <tr>
                    <td>Pemesan</td>
                    <td>Pemesan</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s3">
         {!! Form::open(array("method" => "POST", "route" => "bookinglist" )) !!}
            {!! Form::label("warning", "Pesan Peringatan") !!}
            <?php
                $pesan = DB::table('booking')->where("id_booking", '=', $success)->get();
                if($pesan->pesan_warning != null){
                    echo Form::textarea("pesanPeringatan", $pesan->pesan_warning, array("id"=>"warning", "class"=>"materialize-textarea"));
                }
                else {
                    echo Form::textarea("pesanPeringatan", null, array("id"=>"warning", "class"=>"materialize-textarea"));   
                }
            ?>
            
            <div class="row">
                <div class=" col s6 offset-s3 right-align">
                    {!! Form::submit("Submit", ["class"=>"btn waves-effect waves-light", "name"=>"action"]) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection