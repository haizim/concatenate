<x-layout title="Cek Ongkir rajaongkir">
    @include('ongkir._form')
    
    <div class="card mt-3">
        <div class="card-header">Hasil</div>
        <div class="card-body">
            <h5>Asal</h5>
            <p>{{ "$asal[type] $asal[city_name] - $asal[province]" }} </p>
            <h5>Tujuan</h5>
            <p>{{ "$tujuan[type] $tujuan[city_name] - $tujuan[province]" }} </p>
            <h5>Ekspedisi</h5>
            <p>{{ $costs['name'] }} </p>
            <hr>
            <h5>Harga & Estimasi Waktu</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Estimasi Waktu</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($costs['costs'] as $cost)
                    <tr>
                        <td>{{ $cost['description'] }}</td>
                        <td>{{ "Rp. " . number_format($cost['cost'][0]['value'], 0, ',', '.') }}</td>
                        <td>{{ $cost['cost'][0]['etd'] }}</td>
                        <td>{{ $cost['cost'][0]['note'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>