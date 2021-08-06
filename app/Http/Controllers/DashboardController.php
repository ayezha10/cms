<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function datadiri(Request $request)
    {
        $nama = $request->nama;
        $npm = $request->npm;
        $idline = $request->idline;
        $alamat = $request->alamat;

        DB::table('mail')->insert([
            'nama' => $nama,
            'npm' => $npm,
            'idline' => $idline,
            'alamat' => $alamat
        ]);

        Session::flash('pesan', 'Pesan berhasil dikirim, Terima Kasih');
        return redirect('/');
    }
}
