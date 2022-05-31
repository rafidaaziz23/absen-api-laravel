<?php

namespace App\Http\Controllers;

use App\Models\Nis;
use App\Models\Kelas;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = Murid::with('nis','kelas')->latest()->get();
        
        return view('murid.index', compact('murid'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $murid = new Murid;
        $nis = Nis::all();
        $kelas = Kelas::all();
        return view('murid.tambah', compact(
            'kelas',
            'murid',
            'nis'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto'     => 'required|file|image|mimes:jpeg,png,jpg,svg|max:2048',
            'nama'    => 'required',
            'kelas_id'    => 'required',
            'nis_id'    => 'required',
            'password'   => 'nullable',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('murid.create')
            ->with('failed', 'Murid Create Not Success');
        }

        // upload image
        $file = $request->file('foto');
        $file_name = $file->hashName();
        $file_path = storage_path('app/public/uploads/murid');
        $file->move($file_path, $file_name);
    
        //create user
        Murid::create([
            'foto'     => $file_name,
            'nama' => $request['nama'],
            'kelas_id' => $request['kelas_id'],
            'nis_id' => $request['nis_id'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('murid.index')
            ->with('success', 'Murid Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function show(Murid $murid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function edit(Murid $murid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Murid $murid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Murid  $murid
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //delete image
        $murid = Murid::find($id);
        Storage::delete('public/uploads/murid/'. $murid->foto);
        $murid->delete();

        return redirect()->route('murid.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
