@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reservation Form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="pain_type" class="col-md-4 col-form-label text-md-right">{{ __('Pain Type') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select @error('pain_type') is-invalid @enderror" name="pain_type" id="pain_type" autofocus>
                                    <option selected disabled>Open this select menu</option>
                                    @foreach ($pains as $pain)
                                        <option value="{{ $pain->type }}">{{ $pain->type }}</option>
                                    @endforeach
                                </select>

                                @error('pain_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reserve') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection