<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Json;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Nis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $input = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'required',
            'password' => 'required',
            'nis' => 'required',
        ]);

        if ($input->fails()) {
            return new Json(422, 'Error', $input->errors());
        }

        $cekNis = Nis::where('nomer', $request->nis)->first();

        if (is_null($cekNis)) {
            return new Json('404', 'Nis tidak ditemukan', $cekNis);
        }

        $cekKelas = Kelas::where('kelas', $request->kelas)->first();

        if (is_null($cekKelas)) {
            return new Json('404', 'Kelas tidak ditemukan', $cekKelas);
        }

        $createMurid = Murid::create([
            'nis_id' => $cekNis->id,
            'kelas_id' => $cekKelas->id,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
        ]);

        return new Json('200', 'Created', $createMurid);
    }
}
