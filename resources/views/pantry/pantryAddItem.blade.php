@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white border-white">
                <div class="card-header">Artikel Hinzufügen</div>

                <div class="card-body text-white">
                    <form method="POST" action="{{ route('item.add') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="text-white form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Menge') }}</label>
                            <div class="col-md-6">
                                <input id="weight" type="number" class="text-white form-control" name="weight" value="{{ old('weight') }}" required autocomplete="weight">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="unit" class="col-md-4 col-form-label text-md-end">{{ __('Einheit') }}</label>
                            <div class="col-md-6">
                                <select id="unit" class="text-white form-control" name="unit" required>
                                    <option value="Gramm" {{ old('unit') == 'Gramm' ? 'selected' : '' }}>Gramm</option>
                                    <option value="Milliliter" {{ old('unit') == 'Milliliter' ? 'selected' : '' }}>Milliliter</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expiry_date" class="col-md-4 col-form-label text-md-end">{{ __('Ablaufdatum') }}</label>
                            <div class="col-md-6">
                                <input id="expiry_date" type="date" class="text-white form-control" name="expiry_date" value="{{ old('expiry_date') }}" required autocomplete="expiry_date">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-6 offset-md-4 d-flex justify-content-between">
                                <div class="flex">
                                    <a href="{{route('items.show')}}">zur Artikelübersicht</a>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary" type="submit">{{ __('Hinzufügen') }}</button>
                                </div>
                                <div class="">
                                    <a class="btn btn-primary"  href="{{route('item.scan')}}">{{ __('Scan') }}</a>
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