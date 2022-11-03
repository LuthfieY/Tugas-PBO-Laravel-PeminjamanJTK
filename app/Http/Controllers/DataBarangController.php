<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_barangs = DataBarang::all();
        return view('data_barang.index', [
            'data_barangs' => $data_barangs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_barang.create');
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
                'nama_barang' => 'required',
                'status' => 'required',
                'kategori' => 'required'
            ]);
            $array = $request->only([
                'nama_barang', 'status', 'kategori'
            ]);
            $data_barang = DataBarang::create($array);
            return redirect()->route('data_barang.index')
                ->with('success_message', 'Berhasil menambah data barang baru');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('data_barang.index')
            ->with('error_message','Error ketika menambahkan barang');
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
    public function edit($kode_barang)
    {
        $data_barang = DataBarang::find($kode_barang);
        if (!$data_barang) return redirect()->route('data_barang.index')
            ->with('error_message', 'Data barang tidak ditemukan');
        return view('data_barang.edit', [
            'data_barang' => $data_barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_barang)
    {
        try{
            $request->validate([
                'nama_barang' => 'required',
                'status' => 'required',
                'kategori' => 'required'
            ]);
            $data_barang = DataBarang::find($kode_barang);
            $data_barang->nama_barang = $request->nama_barang;
            $data_barang->status = $request->status;
            $data_barang->kategori = $request->kategori;
            $data_barang->save();
            return redirect()->route('data_barang.index')
                ->with('success_message', 'Berhasil mengubah data barang');
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('data_barang.index')
            ->with('error_message','Error ketika mengubah data barang');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang)
    {
        try{
            $data_barang = DataBarang::find($kode_barang);
            if (!$data_barang) return redirect()->route('data_barang.index')
                ->with('error_message', 'Data barang tidak ditemukan');
            if ($data_barang->delete()) {
                return redirect()->route('data_barang.index')
                    ->with('success_message', 'Berhasil menghapus data barang');
            } else {
                return redirect()->route('data_barang.index')
                    ->with('error_message', 'Gagal menghapus data barang');
            }
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('data_barang.index')
            ->with('error_message','Error ketika menghapus data barang');
        }
    }
}