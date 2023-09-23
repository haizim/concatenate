<x-layout title="Bage Concat">
    @include('bage-concat._form')

    <div class="card mt-3">
        <div class="card-header">Hasil</div>
        <div class="card-body">
            @foreach ($loops as $l => $val)
                {{ "$l . $val" }}<br>
            @endforeach
        </div>
    </div>
</x-layout>