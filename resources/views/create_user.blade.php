<h3>Crear Nuevo Empleado</h3>
<button type="button" onclick="createUser()" class="btn btn-outline-danger close"><i
        class="fa-solid fa-xmark"></i></button>
<form class="row g-3 needs-validation" validate>
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" value="" name="name" required class="form-control" id="namecreate" placeholder="Nombre">
            <label for="namecreate">Nombre</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">
            <input type="text" value="" name="last_name" required class="form-control" id="lastnamecreate"
                placeholder="Apellido">
            <label for="lastnamecreate">Apellido</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" value="" name="dni" required class="form-control" id="dnicreate"
                placeholder="Identificación">
            <label for="dnicreate">Identificación</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" value="" name="address" required class="form-control" id="addresscreate"
                placeholder="Dirección">
            <label for="addresscreate">Dirección</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input type="text" value="" name="phone" required class="form-control" id="phonecreate"
                placeholder="Telefono">
            <label for="phonecreate">Telefono</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <select value="" class="form-select" value="" id="jobcreate" aria-label="Floating label select example">
                <option value="" selected>Seleccione una o varias opciones</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}">{{ $cargo->name_workstation }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Cargo</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select value="" onchange="enabledepartment()" class="form-select" id="selectCountry">
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
            <select value="" onchange="enableCity()" class="form-select" id="selectDepartment" disabled>
                <option value="" selected>Seleccione un departamento</option>
                
            </select>
            <label for="selectDepartment">departamento</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select value="" class="form-select" id="citySelect" disabled>
                <option value="" selected>Seleccione una ciudad</option>
            </select>
            <label for="citySelect">Ciudad</label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-success" type="button" onclick="createNewUser()">Crear Empleado</button>
    </div>
</form>
