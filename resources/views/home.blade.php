@extends('layouts.app')

@section('content')
<div class="container text-white posotion position-relative">
    @if (Auth::check())

    <div class="">
        <div class="h1 text-center p-3 mb-5">Hi {{ Auth::user()->name }}!</div>
    </div>
    <div class="row gx-2 gy-2">
        <div class="col-12">
            <div class="card text-white">


                <div class="overview-card card-body content-bg">
                    <h5 class="card-title">Artikelübersicht</h5>
                    <div class="row p-3">
                        <div class="col-5"><img class="overview-circle" src="/images/kreis.svg" alt=""></div>

                        <div class="col-7">
                       

                            <ul>
                                <li>Abgelaufen</li>
                                <li>Lauft bald ab</li>
                                <li>Haltbar</li>
                                <li>Kein Datum</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card text-white content-bg">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('items.show')}}" class="btn btn-primary">Voratskammer</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card text-white content-bg">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('item.create')}}" class="btn btn-primary">Artikel Hinzufügen</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container text-white position-absolute" style="margin: auto;">
        <h1>Welcome to PantryGenie</h1>
        <h2> Your Pantry's Good Spirit!</h2>
    </div>
    @endif
</div>
@endsection