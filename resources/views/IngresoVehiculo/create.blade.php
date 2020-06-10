@extends ('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva Ingreso Vehiculo</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!!Form::open(array('url'=>'ingresoV','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}

        <div class="form-group">
            <label for="fecha">Fecha Ingreso</label>
            <input type="text" name="fecha_ingreso" class="form-control" placeholder="Fecha Ingreso.." value="{{date('Y-m-d H:i:s') }}" disable>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control selectpicker" data-livesearch="true" required>
            <option value="" disabled selected>Opcion de Estado:</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
            </select>
            
            
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="users_id" class="form-control" value="1" readonly>
            </div>

            <div class="form-group">
            <label for="Role">ID Vehiculo - Placa</label>
            <select name="vehiculos_id" id="vehiculos_id" class="form-control selectpicker" data-livesearch="true" required>
                <option value="" disabled selected>Vehiculo:</option>
                @foreach($vehiculo as $vehiculo)
                <option value="{{$vehiculo->id}}">{{ $vehiculo->placa }}</option>
                @endforeach
            </select>
        </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></button>
                <button class="btn btn-danger" type="reset">Cancelar  <span class="glyphicon glyphicon-remove-circle"></button>
                <a href="{{url('ingresoV')}}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></span></a>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
    @endsection