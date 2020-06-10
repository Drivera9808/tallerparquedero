@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Registrar Nuevo Empleado</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::open(array('url'=>'empleado','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingresa Nombre Del Empleado..." style="text-align: center">
        </div>
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Ingresa Apellido Del Empleado..." style="text-align: center">
        </div>
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Cedula</label>
            <input type="number" name="cedula" class="form-control" placeholder="Ingresa Cedula Del Empleado..." style="text-align: center">
        </div>
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Dirección</label>
            <input type="text" name="direccion" class="form-control" placeholder="Ingresa Dirección Del Empleado..." style="text-align: center">
        </div>
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Telefono</label>
            <input type="number" name="telefono" class="form-control" placeholder="Ingresa Telefono Del Empleado..." style="text-align: center">
        </div>
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Ingresa Email Del Empleado..." style="text-align: center">
        </div>
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Cargo</label>
            <select name="cargo" id="cargo" class="form-control input-sm">
                <option value="O" disabled selected>Selecione Cargo</option>
                <option value="Administrador">Administrador</option>
                <option value="Operario">Operario</option>
            </select>
            <!--<input type="text" name="cargo" class="form-control" placeholder="Ingresa Cargo Del Empleado..." style="text-align: center">-->
        </div>
        <div class="form-group" style="text-align: center">
            <label for="descripcion">Clave</label>
            <input type="password" name="clave" class="form-control" placeholder="Ingresa Clave Del Empleado..." style="text-align: center">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{ route('empleado.index') }}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></span></a>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection