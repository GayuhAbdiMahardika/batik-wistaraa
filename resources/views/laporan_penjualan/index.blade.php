@extends('admin')

@section('content')
<div class="nk-content">
    <h4 class="text-center">Laporan Penjualan</h4>
    <div class="card card-preview" style="margin-top:30px">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        {{-- <th class="nk-tb-col"><span class="sub-text">ID</span></th> --}}
                        <th class="nk-tb-col"><span class="sub-text">No. Faktur</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Kasir</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Tanggal</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Total</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Detail</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualans as $penjualan)
                    <tr class="nk-tb-item">
                        {{-- <td class="nk-tb-col">{{ $penjualan['id'] }}</td> --}}
                        <td class="nk-tb-col">{{ $penjualan['no_faktur'] }}</td>
                        <td class="nk-tb-col">{{ $penjualan['kasir']['name'] }}</td>
                        <td class="nk-tb-col">{{ $penjualan['tanggal'] }}</td>
                        <td class="nk-tb-col">{{ $penjualan['total'] }}</td>
                        <td class="nk-tb-col">
                            <ul>
                                @foreach($penjualan['detail_penjualan'] as $detail)
                                <li>{{ $detail['barang']['nama_barang'] }} - {{ $detail['jumlah'] }}</li>
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
