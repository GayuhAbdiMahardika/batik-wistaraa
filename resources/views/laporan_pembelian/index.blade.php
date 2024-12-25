@extends('admin')

@section('content')
<div class="nk-content">
    <h4 class="text-center">Laporan Pembelian</h4>
    <div class="card card-preview" style="margin-top:30px">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">No Faktur</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Tanggal</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Supplier</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Total</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Detail</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelians as $pembelian)
                    <tr class="nk-tb-item">
                        <td class="nk-tb-col">{{ $pembelian['no_faktur'] }}</td>
                        <td class="nk-tb-col">{{ $pembelian['tanggal'] }}</td>
                        <td class="nk-tb-col">{{ $pembelian['supplier']['nama_supplier'] }}</td>
                        <td class="nk-tb-col">{{ $pembelian['total'] }}</td>
                        <td class="nk-tb-col">
                            <ul>
                                @foreach($pembelian['detail_pembelian'] as $detail)
                                <li>{{ $detail['barang']['nama_barang'] }} - {{ $detail['jumlah'] }} x {{ $detail['harga'] }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
