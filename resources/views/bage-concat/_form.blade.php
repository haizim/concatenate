<form action="{{ route('bage-concat.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="comment">jumlah perulangan :</label>
        <div class="input-group mb-3">
            <input type="text" name="number" class="form-control" value="{{ $request->number ?? old('number')}}" required>
            <div class="input-group-append">
                <button class="btn btn-primary">Mulai perulangan</button>
            </div>
        </div>
    </div>
</form>