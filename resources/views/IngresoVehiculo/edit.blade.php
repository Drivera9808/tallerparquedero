@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3 style="text-align: center">Actualizar Datos Del Ingreso</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="panel-body" style="text-align: center">
            <div class="table-container" style="text-align: center">
                <form method="POST" action="{{ route('ingresoV.update',$ingreso->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="form-group">
                        <label for="Role">Fecha Ingreso</label>
                        <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control input-sm" value="{{$ingreso->fecha_ingreso}}" style="text-align: center">
                    </div>


                    <div class="form-group">
                        <label for="Role">Estado</label>
                        <select name="estado" id="estado" class="form-control selectpicker" value="{{$ingreso->estado}}" style="text-align: center" data-livesearch="true" required>
                            <option value="" disabled selected>Opcion de Estado:</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Role">Usuario</label>
                        <input readonly name="users_id" id="users_id" class="form-control input-sm" value="{{$ingreso->users_id}}" style="text-align: center">
                    </div>

                    <div class="form-group">
                        <label for="Role">Id Vehiculo</label>
                        <input readonly name="vehiculos_id" id="vehiculos_id" class="form-control input-sm" value="{{$ingreso->vehiculos_id}}" style="text-align: center">
                    </div>

            </div>
        </div>

            <div class="form-group" style="text-align: center">
                <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
                <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
                <a href="{{ route('ingresoV.index') }}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></a>
            </div>
        </div>
    </div>
    @endsection