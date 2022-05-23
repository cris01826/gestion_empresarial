<h3>Crear Nuevo Empleado</h3>
<button type="button" onclick="createUser()" class="btn btn-outline-danger close"><i
        class="fa-solid fa-xmark"></i></button>
<form action="{{ route('users.store') }}" method="POST" class="row g-3 needs-validation" validate>
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" name="name" required class="form-control" id="floatingPassword" placeholder="Nombre">
            <label for="floatingPassword">Nombre</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" name="last_name" required class="form-control" id="floatingPassword"
                placeholder="Apellido">
            <label for="floatingPassword">Apellido</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" name="dni" required class="form-control" id="floatingPassword"
                placeholder="Identificación">
            <label for="floatingPassword">Identificación</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" name="address" required class="form-control" id="floatingPassword"
                placeholder="Dirección">
            <label for="floatingPassword">Dirección</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" name="phone" required class="form-control" id="floatingPassword"
                placeholder="Telefono">
            <label for="floatingPassword">Telefono</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option selected>Seleccione una o varias opciones</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->name_workstation }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Cargo</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select onchange="enabledepartment()" class="form-select" id="selectCountry">
                <option value="" selected>Seleccione un país</option>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->id }}">{{ $pais->name_country }}</option>
                @endforeach
            </select>
            <label for="selectCountry">Pais de nacimiento</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select onchange="enableCity()" class="form-select" id="selectDepartment" disabled>
                <option selected>Seleccione un departamento</option>
                
            </select>
            <label for="selectDepartment">departamento</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select class="form-select" id="citySelect" disabled>
                <option selected>Seleccione una ciudad</option>
    
            </select>
            <label for="citySelect">Ciudad</label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-success" type="submit">Crear Empleado</button>
    </div>
</form>
