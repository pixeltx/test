<div>
    <div class="px-2 mt-2">
        <h1>Transaksi</h1>
        <div class="container">
            <div class="row mt-2">
                <div class="col-12">
                    @if (!$activeTransaction)
                    <button class="btn btn-primary" wire:click='newTransaction'>New Transaction</button>
                    @else
                    <button class="btn btn-danger" wire:click='cancelTransaction'>Cancel</button>
                    @endif
                    <button class="btn btn-info" wire:loading>...</button>
                </div>
            </div>
            @if($activeTransaction)
            <div style="width: 75rem;">
                <div class="row mt-3">
                    <div class="col-8">
                        <div class="card border-primary">
                            <div class="card-body">
                                <h4 class="card-title">Invoice : {{ $activeTransaction->kode }}</h4>
                                <input type="text" class="form-control my-2" placeholder="Kode Barang" wire:model.live='kode'>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($semuaProduk as $produk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $produk->produk ? $produk->produk->kode : '' }}</td>
                                                <td>{{ $produk->produk ? $produk->produk->nama : '' }}</td>
                                                <td>{{ $produk->produk ? number_format($produk->produk->harga, 2, '.', ',') : '' }}</td>
                                                <td>
                                                    {{ $produk->jumlah_produk }}
                                                </td>
                                                <td>{{ $produk->produk ? number_format($produk->produk->harga * $produk->jumlah_produk, 2, '.', ',') : '' }}</td>
                                                <td><button class="btn btn-danger" wire:click='hapusProduk({{ $produk->id }})'>Hapus</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-primary">
                            <div class="card-body">
                                <h4 class="card-title">Total</h4>
                                <div class="d-flex justify-content-between">
                                    <span>Rp. </span>
                                    <span>{{ number_format($totalBelanja, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card border-primary mt-2">
                            <div class="card-body">
                                <h4 class="card-title">Bayar</h4>
                                <input type="number" class="form-control" placeholder="Nominal" wire:model.live='bayar'>
                            </div>
                        </div>
                        <div class="card border-primary mt-2">
                            <div class="card-body">
                                <h4 class="card-title">Kembalian</h4>
                                <div class="d-flex justify-content-between">
                                    <span>Rp. </span>
                                    <span>{{ number_format($kembalian, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        @if ($bayar)
                            @if ($kembalian < 0)
                                <div class="alert alert-danger mt-2" role="alert">Uang Kurang</div>
                            @else
                                <button class="btn btn-success mt-2 w-100" wire:click='processTransaction'>Bayar</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
