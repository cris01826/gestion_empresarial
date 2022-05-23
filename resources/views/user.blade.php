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
                                    <button onclick="editUser();findUser({{ $user->id }})" type="button"
                                        class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Editar usuario"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button" onclick="deleteUser({{ $user->id }})"
                                        class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Eliminar usuario"><i class="fa-solid fa-trash-can"></i></button>
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
                            content += "<option value='" + department.id + "'>" + department.name_department +
                                "</option>"
                        }
                        document.getElementById('selectDepartment').innerHTML = content
                    } else {

                    }

                },
                error: function(request, status, error) {
                    console.log(request);
                }
            });
        }

        function enabledepartmentUpdate() {
            var country = document.getElementById('selectCountryupdate')
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
                            content += "<option value='" + department.id + "'>" + department.name_department +
                                "</option>"
                        }
                        document.getElementById('selectDepartmentupdate').innerHTML = content
                    } else {

                    }

                },
                error: function(request, status, error) {
                    console.log(request);
                }
            });
        }

        function enableCityUpdate() {
            var department = document.getElementById('selectDepartmentupdate')

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
                        content += "<option selected>Seleccione una ciudad </option>"
                        for (let i = 0; i < data.length; i++) {
                            const city = data[i];
                            content += "<option value='" + city.id + "'>" + city.name_city + "</option>"
                        }
                        document.getElementById('citySelectupdate').innerHTML = content
                    } else {

                    }

                },
                error: function(request, status, error) {
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
                        content += "<option selected>Seleccione una ciudad </option>"
                        for (let i = 0; i < data.length; i++) {
                            const city = data[i];
                            content += "<option value='" + city.id + "'>" + city.name_city + "</option>"
                        }
                        document.getElementById('citySelect').innerHTML = content
                    } else {

                    }

                },
                error: function(request, status, error) {
                    console.log(request);
                }
            });
        }

        function createNewUser() {

            var name = document.getElementById('namecreate').value
            var last_name = document.getElementById('lastnamecreate').value
            var dni = document.getElementById('dnicreate').value
            var address = document.getElementById('addresscreate').value
            var phone = document.getElementById('phonecreate').value
            var job = document.getElementById('jobcreate').value
            var country = document.getElementById('selectCountry').value
            var department = document.getElementById('selectDepartment').value
            var city = document.getElementById('citySelect').value

            if (name == '' || name == null) {
                toastr.error('No ha ingresado un nombre', 'Error')
                return
            }
            if (last_name == '' || last_name == null) {
                toastr.error('No ha ingresado un apellido', 'Error')
                return
            }
            if (dni == '' || dni == null) {
                toastr.error('No ha ingresado un numero de identificación', 'Error')
                return
            }
            if (address == '' || address == null) {
                toastr.error('No ha ingresado una dirección', 'Error')
                return
            }
            if (phone == '' || phone == null) {
                toastr.error('No ha ingresado un telefono', 'Error')
                return
            }
            if (job == '' || job == null) {
                toastr.error('No ha ingresado un cargo', 'Error')
                return
            }
            if (country == '' || country == null) {
                toastr.error('No ha seleccionado el país de nacimiento', 'Error')
                return
            }
            if (department == '' || department == null) {
                toastr.error('No ha seleccionado el departamento de nacimiento', 'Error')
                return
            }
            if (city == '' || city == null) {
                toastr.error('No ha seleccionado la ciudad de nacimiento', 'Error')
                return
            }

            $.ajax({
                url: "/createUser",
                type: "post",
                dataType: "json",
                data: {
                    name: name,
                    last_name: last_name,
                    dni: dni,
                    address: address,
                    phone: phone,
                    job: job,
                    country: country,
                    department: department,
                    city: city,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    document.getElementById("editUser").style.display = "block";
                    document.getElementById("createUser").style.display = "none";

                    let contentCountry = "";
                    contentCountry += "<option selected>Seleccione un país</option>";
                    for (let i = 0; i < data.country.length; i++) {
                        const country = data.country[i];
                        contentCountry += "<option value='" + country.id + "'>" + country.name_country +
                            "</option>";
                    }
                    document.getElementById('selectCountryupdate').innerHTML = contentCountry;
                    let content2 = "";
                    content2 += "<option selected>Seleccione un departamento</option>";
                    for (let d = 0; d < data.department.length; d++) {
                        const department = data.department[d];
                        content2 += "<option value='" + department.id + "'>" + department.name_department +
                            "</option>";
                    }
                    document.getElementById('selectDepartmentupdate').innerHTML = content2;

                    let content3 = "";
                    content3 += "<option selected>Seleccione una ciudad </option>";
                    for (let c = 0; c < data.city.length; c++) {
                        const city = data.city[c];
                        content3 += "<option value='" + city.id + "'>" + city.name_city + "</option>";
                    }
                    document.getElementById('citySelectupdate').innerHTML = content3;

                    document.getElementById('nameupdate').value = data.user.name;
                    document.getElementById('lastnameupdate').value = data.user.last_name;
                    document.getElementById('dniupdate').value = data.user.dni;
                    document.getElementById('addressupdate').value = data.user.address;
                    document.getElementById('phoneupdate').value = data.user.phone;
                    document.getElementById('jobupdate').value = job;
                    document.getElementById('selectCountryupdate').value = parseInt(data.user.id_country);
                    document.getElementById('selectDepartmentupdate').value = parseInt(data.user.id_department);
                    document.getElementById('citySelectupdate').value = parseInt(data.user.id_city);
                    document.getElementById('userId').value = data.user.id;
                    toastr.success('Se ha creado el usuario correctamente', 'Exito');

                },
                error: function(request, status, error) {
                    console.log(request);
                }
            });

        }

        function updateUser() {
            var id = document.getElementById('userId').value
            var name = document.getElementById('nameupdate').value
            var last_name = document.getElementById('lastnameupdate').value
            var dni = document.getElementById('dniupdate').value
            var address = document.getElementById('addressupdate').value
            var phone = document.getElementById('phoneupdate').value
            var job = document.getElementById('jobupdate').value
            var country = document.getElementById('selectCountryupdate').value
            var department = document.getElementById('selectDepartmentupdate').value
            var city = document.getElementById('citySelectupdate').value

            if (name == '' || name == null) {
                toastr.error('No ha ingresado un nombre', 'Error')
                return
            }
            if (last_name == '' || last_name == null) {
                toastr.error('No ha ingresado un apellido', 'Error')
                return
            }
            if (dni == '' || dni == null) {
                toastr.error('No ha ingresado un numero de identificación', 'Error')
                return
            }
            if (address == '' || address == null) {
                toastr.error('No ha ingresado una dirección', 'Error')
                return
            }
            if (phone == '' || phone == null) {
                toastr.error('No ha ingresado un telefono', 'Error')
                return
            }
            if (job == '' || job == null) {
                toastr.error('No ha ingresado un cargo', 'Error')
                return
            }
            if (country == '' || country == null) {
                toastr.error('No ha seleccionado el país de nacimiento', 'Error')
                return
            }
            if (department == '' || department == null) {
                toastr.error('No ha seleccionado el departamento de nacimiento', 'Error')
                return
            }
            if (city == '' || city == null) {
                toastr.error('No ha seleccionado la ciudad de nacimiento', 'Error')
                return
            }

            $.ajax({
                url: "/updateUser",
                type: "post",
                dataType: "json",
                data: {
                    id: id,
                    name: name,
                    last_name: last_name,
                    dni: dni,
                    address: address,
                    phone: phone,
                    job: job,
                    country: country,
                    department: department,
                    city: city,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    toastr.success('Se ha actualizado el usuario correctamente', 'Exito');
                },
                error: function(request, status, error) {
                    console.log(request);
                }
            });

        }

        function findUser(id) {
            var idUser = id;

            $.ajax({
                url: "/findUser",
                type: "post",
                dataType: "json",
                data: {
                    id: idUser,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    let contentCountry = "";
                    contentCountry += "<option selected>Seleccione un país</option>";
                    for (let i = 0; i < data.country.length; i++) {
                        const country = data.country[i];
                        contentCountry += "<option value='" + country.id + "'>" + country.name_country +
                            "</option>";
                    }
                    document.getElementById('selectCountryupdate').innerHTML = contentCountry;
                    let content2 = "";
                    content2 += "<option selected>Seleccione un departamento</option>";
                    for (let d = 0; d < data.department.length; d++) {
                        const department = data.department[d];
                        content2 += "<option value='" + department.id + "'>" + department.name_department +
                            "</option>";
                    }
                    document.getElementById('selectDepartmentupdate').innerHTML = content2;

                    let content3 = "";
                    content3 += "<option selected>Seleccione una ciudad </option>";
                    for (let c = 0; c < data.city.length; c++) {
                        const city = data.city[c];
                        content3 += "<option value='" + city.id + "'>" + city.name_city + "</option>";
                    }
                    document.getElementById('citySelectupdate').innerHTML = content3;

                    document.getElementById('nameupdate').value = data.user.name;
                    document.getElementById('lastnameupdate').value = data.user.last_name;
                    document.getElementById('dniupdate').value = data.user.dni;
                    document.getElementById('addressupdate').value = data.user.address;
                    document.getElementById('phoneupdate').value = data.user.phone;
                    document.getElementById('selectCountryupdate').value = parseInt(data.user.id_country);
                    document.getElementById('selectDepartmentupdate').value = parseInt(data.user.id_department);
                    document.getElementById('citySelectupdate').value = parseInt(data.user.id_city);
                    document.getElementById('userId').value = data.user.id;
                },
                error: function(request, status, error) {
                    console.log(request);
                }
            });
        }

        function deleteUser(id) {
            var idUser = id;
            if (window.confirm("Seguro deseas eliminar el empleado")) {
                $.ajax({
                    url: "/deleteUser",
                    type: "delete",
                    dataType: "json",
                    data: {
                        id: idUser,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);
                        var name = data.user.name + ' ' + data.user.last_name;
                        toastr.success('Se eliminó correctamente el usuario ' + name)
                        setTimeout(() => {
                            location.reload() 
                        }, 2000);
                    },
                    error: function(request, status, error) {
                        console.log(request);
                    }
                });
            } else {
                return
            }
        }
    </script>
@endsection
