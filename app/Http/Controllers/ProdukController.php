<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::select('id', 'nama', 'harga', 'foto')->latest()->paginate(5);
        return view('lihatproduk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg'
        ]);

        $foto = time() . '-' . $request->foto->getClientOriginalName();
        $request->foto->move('fotoproduk', $foto);

        Produk::create([
            'nama' => $request->nama,
            'foto' => $foto,
            'harga' => $request->harga
        ]);

        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::select('id', 'nama', 'harga', 'foto')->get();
        return view('katalog', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::select('id', 'nama', 'harga')->whereId($id)->firstOrFail();
        return view('editproduk', compact('produk'));
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
        $request->validate([
            'nama' => 'required',
            'foto' => 'mimes:jpg,jpeg,png',
            'harga' => 'required'
        ]);

        $data = [
            'nama' => $request->nama,
            'harga' => $request->harga
        ];

        $produk = Produk::select('foto', 'id')->whereId($id)->first();
        if ($request->foto) {
            File::delete('fotoproduk/' . $produk->foto);

            $foto = time() . '-' . $request->foto->getClientOriginalName();
            $request->foto->move('fotoproduk/', $foto);

            $data['foto'] = $foto;
        }

        $produk->update($data);

        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::select('foto', 'id')->whereId($id)->first();
        File::delete('fotoproduk' . $produk->foto);
        $produk->delete();

        return redirect('/produk');
    }
}
