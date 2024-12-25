@extends('admin')

@section('content')

<div class="nk-content">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h4 class="text-center">Produk</h4>
    <div class="card card-preview" style="margin-top:30px">
        <div class="card-inner">
            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            {{-- <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="id">
                                <label class="custom-control-label" for="id"></label>
                            </div> --}}
                            &nbsp;
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Nama Barang</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Stok</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Harga</span></th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($products as $product)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input cek_barang" value="{{ $product['id'] }}" id="barang_{{ $product['id'] }}"  {{ isset($cek[$product['id']]) && $cek[$product['id']] == 1 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="barang_{{ $product['id'] }}"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                {{-- <div class="user-card"> --}}
                                    {{-- <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                        <span>{{ strtoupper(substr($product->name, 0, 2)) }}</span>
                                    </div> --}}
                                    {{-- <div class="user-info"> --}}
                                        <span class="tb-lead">{{ $product['nama_barang'] }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                        {{-- <span>{{ $product->email }}</span>
                                    </div> --}}
                                {{-- </div> --}}
                            </td>
                            <td class="nk-tb-col tb-col-mb" data-order="{{ $product['stok'] }}">
                                <span class="tb-amount">{{ $product['stok'] }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $product['harga'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
    <div class="text-right" style="margin-top: 20px;">
        <a href="{{ url()->previous() }}" class="btn btn-danger">
            <em class="icon ni ni-arrow-left"></em> Kembali
        </a>
    </div>
</div>
@push('scripts')
<script>
    document.querySelectorAll('.cek_barang').forEach(item => {
        item.addEventListener('change', event => {
            const productId = event.target.value;
            if (event.target.checked) {
                fetch('{{ route('add.to.session') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: productId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(data.success);
                    } else {
                        console.error(data.error);
                    }
                });
            } else {
                fetch('{{ route('remove.from.session') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: productId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log(data.success);
                    } else {
                        console.error(data.error);
                    }
                });
            }
        });
    });
</script>
@endpush
@endsection
