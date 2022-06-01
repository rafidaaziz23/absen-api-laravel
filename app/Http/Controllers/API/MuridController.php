<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Json;
use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function getById($id)
    {
        $data = Murid::with('nis', 'kelas')->find($id);

        if (!$data) {
            return new Json(false, 'Murid tidak ditemukan!', null);
        }

        return new Json(true, '', $data);
    }
}
