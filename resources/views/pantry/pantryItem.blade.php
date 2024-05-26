@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="">
        <div class="h1 text-center p-3 mb-5">Pantry</div>
    </div>
    <div class="row gx-2 gy-2">
        <div class="col-12">
            <div class="card text-white">
                <a href="{{ route('items.show')}}" class="btn btn-primary">Zurück</a>

              <div class="overview-card card-body content-bg">
                    <h2 class="card-title">Ein Item</h2>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card text-white content-bg">
                <div class="card-body">
                    <h3 class="">{{ $item->name }}</h3>
                    <div class="m-2">{{ $item->weight }}{{ $item->unit }}</div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <div>Verbrauchen bis: {{ $item->expiry_date }}</div>
                    <a class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapseOne">Details</a>
                </div>
                <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div>Lagerort: Speisekammer</div>
                        <div>Kategorie: Mehl</div>
                        <div>Hinzugefügt am: {{ $item->created_at }}</div>
                    </div>
                </div>
                <div class="button-container mt-3">
                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary">Bearbeiten</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection