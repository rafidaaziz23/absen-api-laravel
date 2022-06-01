<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\Json;
use App\Models\Kelas;
use App\Models\Murid;
use App\Models\Nis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            return new Json(false, 'Error', $input->errors());
        }

        $cekNis = Nis::where('nomer', $request->nis)->first();

        if (is_null($cekNis)) {
            return new Json(false, 'Nis tidak ditemukan', $cekNis);
        }

        $cekKelas = Kelas::where('kelas', $request->kelas)->first();

        if (is_null($cekKelas)) {
            return new Json(false, 'Kelas tidak ditemukan', $cekKelas);
        }

        $createMurid = Murid::create([
            'nis_id' => $cekNis->id,
            'kelas_id' => $cekKelas->id,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
        ]);

        return new Json(true, 'Created', $createMurid);
    }

    public function login(Request $request)
    {
        $input = Validator::make($request->all(), [
            'password' => 'required',
            'nis' => 'required',
        ]);

        if ($input->fails()) {
            return new Json(false, 'Error', $input->errors());
        }

        $cekNis = Nis::where('nomer', $request->nis)->first();

        if (!$cekNis) {
            return new Json(false, 'Nis tidak ditemukan', $cekNis);
        }

        $user = Murid::where('nis_id', $cekNis->id)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return new Json(false, 'Password Salah', null);
        }

        return new Json(true, 'Login Sukses', $user);
    }
}
