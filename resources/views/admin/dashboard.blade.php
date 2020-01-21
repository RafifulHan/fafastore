@extends('templates.admin_master')
@section( 'tab-title', 'Dashboard' )
@section( 'admin-logged', "$adminLogged" )
@section( 'content' )

    <div id="content">
        <table>
            <thead>
                <tr>
                    <th>Nama Customer</th>
                    <th>Alamat Email</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat Pengiriman</th>
                    <th>Nama Barang</th>
                    <th>Jenis Produk</th>
                    <th>Kode Barang</th>
                    <th>Tanggal Order</th>
                    <th>Harga Per-Item</th>
                    <th>Jumlah Item</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>

        @if( isset( $orders ) )

            @foreach( $orders as $order )

                <tr>
                    <td>{{ $order->nama_lengkap }}</td>
                    <td>{{ $order->alamat_email }}</td>
                    <td>{{ $order->nomor_telepon }}</td>
                    <td>{{ $order->alamat_pengiriman }}</td>
                    <td>{{ $order->nama_barang }}</td>
                    <td>{{ $order->jenis_produk }}</td>
                    <td>{{ $order->kode_barang }}</td>
                    <td>{{ $order->tanggal_order }}</td>
                    <td>Rp. {{ $order->harga_peritem }}</td>
                    <td>{{ $order->jml_item }}</td>
                    <td>Rp. {{ $order->total_harga }}</td>
                </tr>

            @endforeach
        @else
            <?php header('Location: /login/admin') ?>
        @endif

            </tbody>
        </table>
    </div>

@stop