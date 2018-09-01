@extends('layouts.app')
@section('content')
    @if(!isset($employee))
        <div class="card">
            @include('employees.create')
        </div>
    @else
        <div class="card">
            @include('employees.edit',['employee' => $employee])
        </div>
    @endif
    <div class="card">
        @include('employees.index',['employees' => $employees])
    </div>

@endsection