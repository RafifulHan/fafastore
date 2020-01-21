<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function home(){
        $datas = DB::table('detail_product')->get();
        return view('home', ['datas' => $datas]);
    }

    public function detail($id){

        $details = DB::table('detail_product')->where( 'id', $id)->get();

        return view('detail_product', ['details' => $details]);

    }

    public function order(Request $request){
        
        $totalHarga = $request->jml_item * $request->harga_peritem;
        $tanggalOrder = date('d-m-Y/h:i:sa');

        DB::table('customers_order')->insert([
            'jenis_produk' => $request->jenis_produk,
            'nama_barang' => $request->nama_barang,
            'harga_peritem' => $request->harga_peritem,
            'total_harga' => $totalHarga,
            'kode_barang' => $request->kode_barang,
            'tanggal_order' => $tanggalOrder,
            'jml_item' => $request->jml_item,
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'nomor_telepon' => $request->nomor_telepon,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat_email' => $request->alamat_email,
        ]);

        return redirect('/');
    }

}
