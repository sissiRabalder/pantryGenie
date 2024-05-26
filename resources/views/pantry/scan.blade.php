@extends('layouts.app')

@section('content')


<div id="scanner-display" class=" text-white">
  <div class="m-5 text-center">
    <h2>Articel Scan</h2>
    <h4>Barcode vor Kamera halten</h4>
  </div>


  <div class="scaner-box">
    <div id="barcode-result" class="text-white"></div>

    <div id="scanner-container">
      <div class="line animate"></div>
    </div>

  </div>


</div>

@endsection