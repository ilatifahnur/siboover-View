<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class Main extends Controller {

    public function index() {
        return view('welcome');
    }
    
    public function home() {
        return view('admin.home');
    }
    
    public function booking() {
        return view('admin.booking');
    }
    
    public function profile() {
        return view('admin.profile');
    }
    
    public function history() {
        return view('admin.history');
    }
    
    public function managebooking() {
        return view('admin.managebooking');
    }
    
    public function manageasset() {
        return view('admin.manageasset');
    }
    
    public function manageaccount() {
        return view('admin.manageaccount');
    }
    
    public function managevehicle() {
        return view('admin.managevehicle');
    }
    
    public function addvehicle() {
        return view('admin.addvehicle');
    }
    
    public function vehicledetail() {
        return view('admin.vehicledetail');
    }
    
    public function pickdriver() {
        return view('admin.pickdriver');
    }
     public function getDriver(Request $request) {
        session_start();
        $_SESSION['tanggal'] = $request->tanggal;
        $_SESSION['waktu'] = $request->waktu;
        $_SESSION['tujuan'] = $request->tujuan;
        $_SESSION['keperluan'] = $request->keperluan;
        return redirect('pickdriver');
    }
    
    public function driverdetail($name) {
        $driver = DB::table('driver')->where('username', "=", $name)->get();
        if ($driver == null){
            return redirect('pickdriver');
        }
        else {
            return view('admin.driverdetail')->withSuccess($name);
        }
    }
    
    public function review() {
        return view('admin.review');
    }
    
    public function profileuser() {
        return view('user.profile');
    }
    
    public function managevehiclef() {
        return view('finance.managevehicle');
    }
    
    public function addmaintenance() {
        return view('finance.addmaintenance');
    }
    
    public function trips() {
        return view('driver.trips');
    }
    
    public function driver() {
        return view('driver.driver');
    }
    
    public function bookinglist() {
        return view('driver.bookinglist');
    }
    
    public function bookingdetails($id) {
        $booking = DB::table('booking')->where('id_booking', "=", $id)->get();
        if ($booking == null){
            return redirect('bookinglist');
        }
        else {
            return view('driver.bookingdetails')->withSuccess($id);
        }
    }

    public function addtrips(Request $request) {
        DB::table('kendaraan')
            ->where('nomorpolisi', 'B1234AA')
            ->update(['jarak' => $request->distance]);

        return view('driver.trips')->withSuccess('Input Berhasil');
    }

    public function updatevehicle(Request $request) {
        DB::table('kendaraan')
            ->where('nomorpolisi', 'B1234AA')
            ->update(['status' => $request->status]);

        return view('admin.vehicledetail')->withSuccess('Status Berhasil Diubah');
    }

    public function updateprofile(Request $request) {        
        DB::table('user')
            ->where('username', 'ilatifah')
            ->update(['nama' => $request->name, 'nohp' => $request->phone, 'email' => $request->email]);

        // $imageName = $request->id . '.' . 
        //     $request->file('image')->getClientOriginalExtension();

        // $request->file('image')->move(
        //     base_path() . '/public/images/profile/', $imageName
        // );

        return view('user.profile')->withSuccess('Profil Berhasil Diubah');
    }
}