<?php

namespace App\Http\Controllers;

use App\Models\catatan;
use App\Models\kategori;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catatan = catatan::get();
        $kategori = kategori::get();
        
        return view('dashboard', compact('catatan', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        catatan::create([             
        'kategori_id' => $request->kategori,         
        'judul' => $request->judul,       
        'kegiatan' => $request->kegiatan,       
        ]);     

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('catatan.edit',[
            'catatan' => catatan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $catatan = catatan::find($id);
        $kategori = kategori::find($id);
        
        $catatan->update([
            'kategori_id' => $request->kategori,
            'judul' => $request->judul,       
            'kegiatan' => $request->kegiatan,   
        ]);
        
        return to_route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = catatan::find($id);

        $jadwal->delete();

        return to_route('dashboard');
    }
}
