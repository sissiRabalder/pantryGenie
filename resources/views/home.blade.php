@extends('layouts.app')

@section('content')
<div class="dashboard container text-white posotion position-relative">
    @if (Auth::check())

    <div class="">
        <div class="h1 text-center p-3 mb-2">Hi {{ Auth::user()->name }}!</div>
    </div>
    <div class="row gx-2 gy-2 circle">
        <div class="col-12">
            <div class="card text-white">
                <div class="overview-card card-body content-bg">
                    <h5 class="card-title">Artikelübersicht</h5>
                    <div class="row p-3 ">
                        <div class="col-12 col-md-5 align-self-center ">
                            <div class="chart-container">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div style="opacity: 0;">
                                <p class="d-inline" id="expired">{{ $expiredItemsCount }}</p>
                                <p class="d-inline" id="expiringSoon">{{ $expiringSoonItemsCount }}</p>
                                <p class="d-inline" id="remaining">{{ $remainingItemsCount }}</p>
                                <p class="d-inline" id="noDate">{{ $noDateItemsCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card text-white content-bg">
                <div class="card-body">
                    <h5 class="card-title">Vorratskammer</h5>
                    <p class="">Schau was du alles in deiner Vorratskammer hast</p>
                    <a href="{{ route('items.show')}}" class="btn btn-primary">Voratskammer</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card text-white content-bg">
                <div class="card-body">
                    <h5 class="card-title">Hinzufügen</h5>
                    <p class="card-text">Nur wenn du deine Vorratskammer am aktuellen Stand haltest, behälts du die volle übersicht.</p>
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