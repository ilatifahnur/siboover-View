<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class kendaraanController extends Controller
{

public function destroy($nomorpolisi){
  DB::table('kendaraan')-> where('nomorpolisi', '=', $nomorpolisi)->delete();
}

  public function addKendaraan(Request $request) {
          // $this->Validate($request,[
          //   'nama kendaraan' => 'required|unique:create|max:255',
          //   'plat nomor kendaraan' => 'required',
          // ]);
          $vehicle = DB::table('kendaraan')->where("nomorpolisi", "=", $request->nomorpolisi)->get();
              if($vehicle == null){
                  DB::table('kendaraan')->insert(
                      ['nama' => $request->serikendaraan, 'nomorpolisi' => $request->nomorpolisi, 'kapasitas' => $request->kapasitas , 'jarak' => 0, 'status' => 0]
                  );
                  return view('admin.managevehicle')->withSuccess('Kendaraan Berhasil Ditambahkan');
              }
              else {
                  return view('admin.addvehicle')->withSuccess('Kendaraan Gagal Ditambahkan');
              }



  }
}
