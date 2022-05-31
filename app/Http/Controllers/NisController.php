<?php

namespace App\Http\Controllers;

use App\Models\Nis;
use Illuminate\Http\Request;

class NisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nis = Nis::latest()->get();
        
        return view('nis.index', compact('nis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nis = new Nis;
        return view('nis.tambah', compact(
            'nis',
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
         Nis::create([
            'nomer'      =>  $request['nomer'],
        ]);

        return redirect()->route('nis.index')
            ->with('success', 'nis Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nis  $nis
     * @return \Illuminate\Http\Response
     */
    public function show(Nis $nis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nis  $nis
     * @return \Illuminate\Http\Response
     */
    public function edit(Nis $nis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nis  $nis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nis $nis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nis  $nis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nis = Nis::find($id);
        $nis->delete();
        
        return redirect()->route('nis.index')
            ->with('success', 'nis deleted successfully');
    }
}
