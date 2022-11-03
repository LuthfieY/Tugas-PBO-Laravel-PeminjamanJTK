<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjams = Peminjam::all();
        return view('peminjam.index', [
            'peminjams' => $peminjams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nama' => 'required', 'nim_nidn' => 'required'
            ]);
            $array = $request->only([
                'nama', 'nim_nidn'
            ]);
            $peminjam = Peminjam::create($array);
            return redirect()->route('peminjam.index')
                ->with('success_message', 'Berhasil menambah data peminjam baru');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('peminjam.index')
            ->with('error_message','Error ketika menambahkan data peminjam');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjam = Peminjam::find($id);
        if (!$peminjam) return redirect()->route('peminjam.index')
            ->with('error_message', 'Data peminjam tidak ditemukan');
        return view('peminjam.edit', [
            'peminjam' => $peminjam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'nama' => 'required',
                'nim_nidn' => 'required'
            ]);
            $peminjam = Peminjam::find($id);
            $peminjam->nama = $request->nama;
            $peminjam->nim_nidn = $request->nim_nidn;
            $peminjam->save();
            return redirect()->route('peminjam.index')
                ->with('success_message', 'Berhasil mengubah data peminjam');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('peminjam.index')
            ->with('error_message','Error ketika mengubah data peminjam');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $peminjam = Peminjam::find($id);
            if (!$peminjam) return redirect()->route('peminjam.index')
                ->with('error_message', 'Data barang tidak ditemukan');
            if ($peminjam->delete()) {
                return redirect()->route('peminjam.index')
                    ->with('success_message', 'Berhasil menghapus data peminjam');
            } else {
                return redirect()->route('peminjam.index')
                    ->with('error_message', 'Gagal menghapus data peminjam');
            }
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('peminjam.index')
            ->with('error_message','Error ketika menghapus data peminjam');
        }
    }
    
}
