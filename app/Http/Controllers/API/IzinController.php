<?php

namespace App\Http\Controllers\api;

use App\Models\Izin;
use App\Models\Murid;
use App\Http\Resources\Json;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Validator;

class IzinController extends Controller
{
    public function doIzin(Request $request ,$id){

        $murid = Murid::where(['id' => $id])->first();
        $murid_nama = $murid['id'];

        $validator = Validator::make($request->all(), [
            'alasan'     => 'required',
            'murid_id'   => 'nullable',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return new Json(false, 'Error', $validator->errors());
        }

        //create izin
        $izin = Izin::create([
            'alasan'     => $request['alasan'],
            'murid_id'   => $murid_nama,
        ]);

        return new Json(true, 'Berhasil Mengirimkan Izin', $izin);

    }

    public function uploadIzin(Request $request,$id){

        $murid = Murid::where(['id' => $id])->first();
        $murid_id = $murid['id'];

        $validator = Validator::make($request->all(), [
            'bukti'     => 'required|max:2048',
        ]);

                //check if validation fails
        if ($validator->fails()) {
            return new Json(false, 'Error', $validator->errors());
        }

         // upload image
        $file = $request->file('bukti');
        $file_name = $file->hashName();
        $file_path = storage_path('app/public/uploads/izin');
        $file->move($file_path, $file_name);

        $izin = Izin::where('id', $murid_id)->update([
            'bukti'     => $file_name,
        ]);

        return new Json(true, 'Berhasil Upload Izin', $izin);

    }
}
