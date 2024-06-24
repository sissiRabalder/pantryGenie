<!-- resources/views/editItem.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card text-white border-white">

                <div class="card-header">{{ __('Artikel Bearbeiten') }}</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('item.update', $item->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="text-white form-control" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Menge') }}</label>
                            <div class="col-md-6">
                                <input id="weight" type="number" class="text-white form-control" name="weight" value="{{ $item->weight }}" required autocomplete="weight">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="unit" class="col-md-4 col-form-label text-md-end">{{ __('Einheit') }}</label>
                            <div class="col-md-6">
                                <select id="unit" class="text-white form-control" name="unit" required>
                                    <option value="Gramm" {{ $item->unit == 'Gramm' ? 'selected' : '' }}>Gramm</option>
                                    <option value="Milliliter" {{ $item->unit == 'Milliliter' ? 'selected' : '' }}>Milliliter</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expiry_date" class="col-md-4 col-form-label text-md-end">{{ __('Ablaufdatum') }}</label>
                            <div class="col-md-6">
                                <input id="expiry_date" type="date" class="text-white form-control" name="expiry_date" value="{{ $item->expiry_date }}" autocomplete="expiry_date">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-6 offset-md-4 d-flex justify-content-between">
                                <div class="flex">
                                    <a href="{{route('items.show')}}">zurück zu Artikel</a>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary" type="submit">{{ __('Speichern') }}</button>
                                </div>

                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection