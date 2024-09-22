<div>
    <div class="px-2 mt-2">
        <h1>Laporan</h1>
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <button wire:click="selectLaporan('transaksi')" class="btn {{ $selectedLaporan=='transaksi' ? 'btn-primary' : 'btn-outline-primary' }}">Laporan Transaksi</button>
                    <button wire:click="selectLaporan('petugas')" class="btn {{ $selectedLaporan=='petugas' ? 'btn-primary' : 'btn-outline-primary' }}">Laporan Petugas</button>
                    <button wire:loading class="btn btn-info">...</button>
                    @if ($selectedLaporan == 'transaksi')
                    <div class="card border-primary">
                        <div class="card-body">
                            <h4 class="card-title">Laporan Transaksi</h4>
                            <a href="{{ url('/cetak') }}" target="_blank">Cetak</a>
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No. Invoice</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @foreach ($semuaTransaksi as $transaksi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaksi->created_at }}</td>
                                            <td>{{ $transaksi->kode }}</td>
                                            <td>Rp. {{ number_format($transaksi->total, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @elseif ($selectedLaporan == 'petugas')
                    <div class="card border-primary" style="width: 75vw;">
                        <div class="card-body">
                            <h4 class="card-title">Laporan Petugas</h4>
                            <a href="{{ url('/cetak') }}" target="_blank">Cetak</a>
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                </thead>
                                <tbody>
                                    @foreach ($semuaPetugas as $petugas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $petugas->name }}</td>
                                        <td>{{ $petugas->email }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
