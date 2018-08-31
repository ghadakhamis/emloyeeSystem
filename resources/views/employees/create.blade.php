@extends('layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Employee Information</h5>
    <div class="card-body">
        <form method="post" action="/employees">
            {{csrf_field()}}
            <div class="form-group row">
                <label for="fullName" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                <div class="col-md-6">
                    <input id="fullName" type="text" name="fullName" class="form-control" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                         {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>    
</div>
@endsection