@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="">
        <div class="h1 text-center p-3 mb-5">Pantry</div>
    </div>
    <div class="row gx-2 gy-2">
        <div class="col-12">
            <div class="card text-white">
                <div class="overview-card card-body content-bg">
                    <h2 class="card-title">Alle vorräte</h2>
                </div>
            </div>
        </div>
        <div class="col-12">
            @if(count($items) > 0)
            @foreach($items as $item)
            <div class="card text-white content-bg">
                <div class="card-body">
                    <div class="card-title d-flex align-items-center">
                        <h3 class="">{{ $item->name }}</h3>
                        <div class="m-2">{{ $item->weight }}{{ $item->unit }}</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        @php
                        $currentDate = \Carbon\Carbon::now();
                        $expiryDate = \Carbon\Carbon::parse($item->expiry_date);
                        @endphp
                        @if ($currentDate  > $expiryDate)
                        <div style="color: #7B68EE;">ABGELAUFEN Verbrauchen bis: {{ $item->expiry_date }}</div>
                        @else
                        <div>Verbrauchen bis: {{ $item->expiry_date }}</div>
                        @endif
                        <a class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapseOne">Details</a>
                    </div>
                    <div id="collapse{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div>Lagerort: Speisekammer</div>
                            <div>Kategorie: Mehl</div>
                            <div>Hinzugefügt am: {{ $item->created_at }}</div>
                        </div>

                        <div class="button-container m-3 d-flex">
                            <div class="button-container mt-3">
                                <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary">Bearbeiten</a>
                            </div>
                            <form method="POST" action="{{ route('item.delete', $item->id) }}">
                                @csrf
                                @method('DELETE')

                                <button style="margin-left:10px;" class="btn btn-primary mt-3" type="submit">Löschen</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            @endforeach
            @else
            <h3>Keine Artikel vorhanden</h3>
            @endif
        </div>
    </div>
    <div class="m-3">
        <a href="{{ route('item.create')}}" class="btn btn-primary">Artikel Hinzufügen</a>
    </div>
</div>

@endsection