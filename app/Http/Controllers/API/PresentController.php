<?php

namespace App\Http\Controllers\API;

use App\Models\Murid;
use App\Models\Present;
use App\Http\Resources\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isEmpty;

class PresentController extends Controller
{
    public function checkIn(Request $request, $id){

        $murid = Murid::where(['id' => $id])->first();
        $murid_id = $murid['id'];

        // $this->timeZone('Asia/Jakarta');
        $date = date("d-m-Y"); 
        $time = date("H:i:s"); 
        $now  = Carbon::now();

        // return new Json(true, 'Test', $date);



        // if($request['status'] == 'Check In'){

            $present = Present::create([
                'murid_id' => $murid_id,
                'status'   => $request['status'],
                'present_at' => $time,
                'present_day' => $date,
            ]);

            return new Json(true, 'Berhasil Absen', $present);

        // }
    }

    public function checkOut(Request $request, $id){

        $murid = Murid::where(['id' => $id])->first();
        $murid_id = $murid['id'];

        // $this->timeZone('Asia/Jakarta');
        $date = date("d-m-Y"); 
        $time = date("H:i:s"); 
        $now  = Carbon::now();

        if($request['status'] == 'Check Out'){

            $present = Present::create([
                'murid_id' => $murid_id,
                'status'   => $request['status'],
                'present_at' => $time,
                'present_day' => $date,
            ]);

            return new Json(true, 'Berhasil Absen', $present);

        }
    }

     public function checkById($id)
    {
        $murid = Murid::where(['id' => $id])->first();
        $murid_id = $murid['id'];

        $data = Present::where('murid_id',$murid_id)->get();

        if (!$data) {
            return new Json(false, 'Hasil Absen Tidak Di Temukan', null);
        }

        return new Json(true, '', $data);
    }
}
