<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReviewController extends Controller
{
    public function tambahReview(Request $request){
        $nilai_review = intval($request->parameter1) + intval($request->parameter2) + intval($request->parameter3) + intval($request->parameter4) + intval($request->parameter5);
        $mean = $nilai_review/5;
        $gentId = 0;
        $cek = DB::table('review')->get();
       
        foreach ($cek as $id) {
            if($id->id_comment > $gentId){
                $gentId = $id->id_comment;
            }
        }
        $gentId = $gentId + 1;
        $mean = number_format($mean, 1);
        DB::table('review')->insert(
            ['id_booking' => 2, 'rating' => $mean, 'comment'=> $request->review, 'id_comment' => $gentId]
        );
        return view('admin.driverdetail');
    }
}