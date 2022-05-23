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
            padding-top: 60px;
            text-align: center;
        }

        .close {
            float: right;
            margin-top: -41px;
            margin-right: -7px;
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
                            <div class="card card-user">
                                <i class="fa-solid fa-user icon-user"></i>
                                <p class="text-user">{{ $user->name }}
                                    {{ $user->last_name }}</p>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button onclick="editUser()" type="button" class="btn btn-success btn-sm"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Editar usuario"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Eliminar usuario"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </div>

                            </div>
                        @endforeach
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
            {{-- información del empleado --}}
            <div class="col-md-8">
                <div class="options" id="options">
                    <h5>Seleccione un empleado</h5>
                    <h5>o</h5>
                    <button type="button" onclick="createUser()" class="btn btn-success">Crear nuevo usuario</button>
                </div>

                <div class="info" style="display: none" id="createUser">
                    @include('create_user')
                </div>
                <div class="info" style="display: none" id="editUser">
                    @include('edit_user')
                </div>
            </div>
        </div>
    </div>

    <script>
     
        function createUser() {
            var x = document.getElementById("createUser");
            var options = document.getElementById("options");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

            if (options.style.display === "none") {
                options.style.display = "block";
            } else {
                options.style.display = "none";
            }
        }

        function editUser() {
            var x = document.getElementById("editUser");
            var options = document.getElementById("options");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

            if (options.style.display === "none") {
                options.style.display = "block";
            } else {
                options.style.display = "none";
            }
        }

        function enabledepartment() {
            var country = document.getElementById('selectCountry')
            console.log('evento', country.value);
            if (country.value != '' || country.value != null) {
                document.getElementById("selectDepartment").removeAttribute("disabled");
            } else if (country.value == '' || country.value == null) {
                console.log('set');
                document.getElementById("selectDepartment").setAttribute("disabled", "disabled");
            }
            $.ajax({
                url: "/deparments",
                type: "post",
                dataType: "json",
                data: {
                    id: country.value,
                },
                headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                success: function(data) {
                    if (data.length != 0) {
                        let content = ""
                        content += "<option selected>Seleccione un departamento</option>"
                        for (let i = 0; i < data.length; i++) {
                            const department = data[i];
                        content += "<option value='"+department.id+"'>"+department.name_department+"</option>"
                        }
                        document.getElementById('selectDepartment').innerHTML = content
                    } else {
                        
                    }

                },error:function(request,status,error){
                    console.log(request);
                }
            });
        }

        function enableCity() {
            var department = document.getElementById('selectDepartment')
            console.log('evento', department.value);
            if (department.value != '' || department.value != null) {
                document.getElementById("citySelect").removeAttribute("disabled");
            } else if (country.department == '' || department.value == null) {
                console.log('set');
                document.getElementById("citySelect").setAttribute("disabled", "disabled");
            }
            $.ajax({
                url: "/cities",
                type: "post",
                dataType: "json",
                data: {
                    id: department.value,
                },
                headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                success: function(data) {
                    if (data.length != 0) {
                        let content = ""
                        content += "<option selected>Seleccione un departamento</option>"
                        for (let i = 0; i < data.length; i++) {
                            const department = data[i];
                        content += "<option value='"+department.id+"'>"+department.name_department+"</option>"
                        }
                        document.getElementById('selectDepartment').innerHTML = content
                    } else {
                        
                    }

                },error:function(request,status,error){
                    console.log(request);
                }
            });
        }
    </script>
@endsection
