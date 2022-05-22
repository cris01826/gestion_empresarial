@extends('layouts.app')
@section('content')
    <style>
        .info {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
                0px 1px 3px 0px rgba(0, 0, 0, 0.08) !important;
        }

        .users {
            height: 515px;
        }

        .list-users {

            height: 420px;
        }

        .card-user {
            margin: 7px;
            padding: 7px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .card-user:hover {
            background: #0d6efd;
            color: #ffffff;
        }

        .text-user {
            margin-bottom: 0px;
            margin-left: 17px;
        }

        .icon-user {
            float: left;
            position: absolute;
            margin-right: 10px;
            margin-top: 4px;
        }

        .options {
            text-align: center;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            {{-- lista de empleados --}}
            <div class="col-md-4">
                <div class="info users">
                    <form action="{{ route('users.index') }}" method="get">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" name="text" class="form-control" value="{{ $text }}"
                                placeholder="Buscar empleado" aria-label="Buscar empleado">
                            <button type="submit" class="btn btn-primary" id="button-addon2">Buscar</button>
                        </div>
                    </form>
                    <div class="list-users">
                        @if (count($users) <= 0)
                            <h5>No hay resultados</h5>
                        @endif
                        @foreach ($users as $user)
                            <div class="card card-user"><i class="fa-solid fa-user icon-user"></i>
                                <p class="text-user">{{ $user->name }}
                                    {{ $user->last_name }}</p>
                            </div>
                        @endforeach
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
            {{-- información del empleado --}}
            <div class="col-md-8">
                <div class="options">
                    <h5>Seleccione un empleado</h5>
                    <h5>o</h5>
                    <button type="button" onclick="createUser()" class="btn btn-success">Crear nuevo usuario</button>
                </div>

                <div class="info" style="display: none" id="createUser">
                   @include('create_user')
                </div>
            </div>
        </div>
    </div>

    <script>
        function createUser() {
            var x = document.getElementById("createUser");
            console.log(x);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endsection
