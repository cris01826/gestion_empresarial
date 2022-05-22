@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border border-primary" href="{{ url('/users') }}">
                    <div class="card-body">
                        <i class="fa-solid fa-users"></i> Empleados

                        <a href="{{ url('/users') }}"
                            style="right: 0;position: absolute;margin-right: 10px;margin-top: -6px;" type="button"
                            class="btn btn-outline-primary">Ver empleados</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body center-text">
                        <i class="fa-solid fa-briefcase"></i> Cargos
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
