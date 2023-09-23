<form action="{{ route('ongkir.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="comment">Asal :</label>
        <div class="input-group">
            <select class="form-control" id="provinsi_asal" name="provinsi_asal" onchange="getKota('asal')" required>
                <option value=''>Provinsi</option>
                @foreach ($provinces as $id => $province)
                <option value="{{ $id }}">{{ $province }}</option>
                @endforeach
            </select>
            <select class="form-control" id="kota_asal" name="origin" required>
                <option value=''>Kota</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="comment">Tujuan :</label>
        <div class="input-group">
            <select class="form-control" id="provinsi_tujuan" name="provinsi_tujuan" onchange="getKota('tujuan')" required>
                <option value="">Provinsi</option>
                @foreach ($provinces as $id => $province)
                <option value="{{ $id }}">{{ $province }}</option>
                @endforeach
            </select>
            <select class="form-control" id="kota_tujuan" name="destination" required>
                <option value=''>Kota</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="comment">Ekspedisi :</label>
        <select class="form-control" id="kurir" name="courier" required>
            <option value=''>Ekspedisi</option>
            @foreach ($ekspedisi as $eks)
            <option value="{{ $eks }}">{{ $eks }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="comment">Berat (gram):</label>
        <input type="text" name='weight' class='form-control' required>
    </div>

    <button class="btn btn-primary">Cek Ongkir</button>
</form>

<script>
    function getKota(target) {
        const provinsi = $('#provinsi_'+target).val()
        let kota = $('#kota_'+target)
        
        kota.html('')
        kota.append("<option value=''>Mengambil data kota...</option>")
        
        $.get( "/api/city/"+provinsi)
        .done(function( data ) {
            kota.html('')
            kota.append("<option value=''>Kota</option>")
            for ([id, name] of Object.entries(data)) {
                kota.append(`<option value='${id}'>${name}</option>`)
            }
        })
    }
</script>