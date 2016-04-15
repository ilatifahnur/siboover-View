<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class BookingController extends Controller
{
    public function tambahPesanWarning(Request $request){
        DB::table('booking')->where("id_booking", "=", "1")->update(["pesan_warning" => $request->pesanPeringatan]);
        return view("driver.bookinglist")->withSuccess("Pesan Peringatan Berhasil Ditambahkan");
    }
    public function buatBooking(Request $request){
        session_start();
        $gabung = $_SESSION['tanggal'] + " " + $_SESSION['waktu'];
        $tanggal_waktu = date("Y-m-d H:i", strtotime($gabung));
        DB::table('booking')->insertGetId(
            ['tanggal_waktu' => $tanggal_waktu, "username_driver" => $request->driver, "username_customer" => "ilham", "tujuan" => $_SESSION['tujuan'], "keperluan" => $_SESSION['keperluan'], "pesan_warning" => ""]
            );
        return redirect('bookinglist');
        //return session()->all();
    }
}