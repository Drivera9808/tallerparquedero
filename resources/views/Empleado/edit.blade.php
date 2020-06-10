@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3 style="text-align: center">Actualizar Datos Del Empleado</h3>
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
                <form method="POST" action="{{ route('empleado.update',$empleado->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$empleado->nombre}}" style="text-align: center">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" id="apellido" class="form-control input-sm" value="{{$empleado->apellido}}" style="text-align: center">
                    </div>
                    <div class="form-group">
                        <input type="number" name="cedula" id="cedula" class="form-control input-sm" value="{{$empleado->cedula}}" style="text-align: center">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" value="{{$empleado->direccion}}" style="text-align: center">
                    </div>
                    <div class="form-group">
                        <input type="number" name="telefono" id="telefono" class="form-control input-sm" value="{{$empleado->telefono}}" style="text-align: center">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control input-sm" value="{{$empleado->email}}" style="text-align: center">
                    </div>
                    <div class="form-group">
                        <select name="cargo" id="cargo" class="form-control input-sm" value="{{$empleado->cargo}}" style="text-align: center">
                            <option value="O" disabled selected>Selecione Cargo</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Operario">Operario</option>
                        </select>
                        <!--<input type="text" name="cargo" id="cargo" class="form-control input-sm" value="{{$empleado->cargo}}" style="text-align: center">-->
                    </div>
                    <div class="form-group">
                        <input type="text" name="clave" id="clave" class="form-control input-sm" value="{{$empleado->clave}}" style="text-align: center">
                    </div>

            </div>
        </div>

        <div class="form-group" style="text-align: center">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{ route('empleado.index') }}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></a>
        </div>
    </div>
</div>
@endsection