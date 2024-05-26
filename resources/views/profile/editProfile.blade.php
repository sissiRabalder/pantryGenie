<!-- resources/views/editItem.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white border-white">
                <div class="card-header">{{ __('Profil Bearbeiten') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', $user) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="text-white form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="text-white form-control" name="email" value="{{ $user->email }}" autocomplete="weight">
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit">{{ __('Speichern') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection