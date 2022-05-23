<h3>Información del empleado</h3>
<button type="button" onclick="editUser()" class="btn btn-outline-danger close"><i class="fa-solid fa-xmark"></i></button>
<form class="row g-3 needs-validation" novalidate>
    <input id="userId" name="userId" type="hidden" value="">
    <div class="col-md-6">
        <div class="form-floating">
            <input value="" type="text" class="form-control" id="nameupdate" placeholder="Password">
            <label for="nameupdate">Nombre</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating">
            <input value="" type="text" class="form-control" id="lastnameupdate" placeholder="Password">
            <label for="lastnameupdate">Apellido</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input value="" type="text" class="form-control" id="dniupdate" placeholder="Password">
            <label for="dniupdate">Identificación</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input value="" type="text" class="form-control" id="addressupdate" placeholder="Password">
            <label for="addressupdate">Dirección</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <input value="" type="text" class="form-control" id="phoneupdate" placeholder="Password">
            <label for="phoneupdate">Telefono</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating">
            <select value="" class="form-select" id="jobupdate">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="jobupdate">Cargo</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select value="" onchange="enabledepartmentUpdate()" class="form-select" id="selectCountryupdate">

            </select>
            <label for="selectCountryupdate">Pais de nacimiento</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select value="" onchange="enableCityUpdate()" class="form-select" id="selectDepartmentupdate">
                <option value="" selected>Seleccione un departamento</option>
            </select>
            <label for="selectDepartmentupdate">departamento</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-floating">
            <select value="" class="form-select" id="citySelectupdate">
                <option value="" selected>Seleccione una ciudad</option>
            </select>
            <label for="citySelectupdate">Ciudad</label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="button" onclick="updateUser()">Actualizar empleado</button>
    </div>
</form>
