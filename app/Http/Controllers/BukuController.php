<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::all();
        return view('buku.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Penulis::all();
        return view('buku.create',['penulis'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'id_penulis' => 'required',
            'genre' => 'required',
            'tempat_terbit' => 'required',
            'penerbit' => 'required'
        ]);
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->storeAs('public', $imageName);
        $validasi['photo'] = $imageName;
        Buku::create($validasi);

        return redirect('/buku')
        ->with('success','berhasil menambahakna buku');
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
        $penulis=Penulis::all();
        $data=Buku::findOrFail($id);

        return view('buku.edit',['data'=>$data,'penulis'=>$penulis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'id_penulis' => 'required',
            'genre' => 'required',
            'tempat_terbit' => 'required',
            'penerbit' => 'required'
        ]);

        $data=Buku::findOrFail($id);
        if ($data->photo) {
            Storage::disk('public')->delete($data->photo);
        }
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->storeAs('public', $imageName);
        $validasi['photo'] = $imageName;
        $data->update($validasi);
        return redirect('/buku')
        ->with('success','berhasil mengupdate buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::findOrFail($id);
        if ($data->photo) {
            Storage::disk('public')->delete($data->photo);
        }
        $data->delete();
        return redirect('/buku')->with('success','sukses delete');
    }
}
