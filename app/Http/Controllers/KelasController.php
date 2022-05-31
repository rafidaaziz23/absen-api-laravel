<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::with('jurusan')->latest()->get();
        
        return view('kelas.index', compact('kelas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = new Kelas;
        $jurusan = Jurusan::all();
        return view('kelas.tambah', compact(
            'kelas',
            'jurusan'
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

        $jurusan_kode = Jurusan::where(['id' => $request['jurusan_id']])->first();
        $jurusan = $jurusan_kode['jurusan_kode'];
        $kelas = $request['kelas'] . ' - ' . $jurusan;

        Kelas::create([
            'kelas'           =>  $kelas,
            'jurusan_id'      =>  $request['jurusan_id'],
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $id)
    {
        // $kelas = Kelas::find($id);
        $jurusan = Jurusan::all();
        return view('kelas.tambah', compact(
            'id',
            'jurusan'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        Kelas::where('id', $kelas->id)->update([
            'kelas'           =>  $request['kelas'],
            'jurusan_id'      =>  $request['jurusan_id'],
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Jurusan Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Kelas::where('id', $kelas->id)->delete();
        $kelas = Kelas::find($id);
        $kelas->delete();
        
        return redirect()->route('kelas.index')
            ->with('success', 'Kelas deleted successfully');
    }
}
