@extends('layouts.app')
@section('content')

    <div class="card">
        @include('employees.create')
    </div>

    <div class="card">
        @include('employees.index',['employees' => $employees])
    </div>

@endsection