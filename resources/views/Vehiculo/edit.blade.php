@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3 style="text-align: center">Actualizar Datos Del Vehiculo</h3>
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
                <form method="POST" action="{{ route('vehiculo.update',$vehiculo->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="form-group">
                        <input type="text" name="color" id="color" class="form-control input-sm" value="{{$vehiculo->color}}" style="text-align: center">
                    </div>

                    <div class="form-group">
                        <select name="tipo" id="tipo" class="form-control input-md" value="{{$vehiculo->tipo}}" style="text-align: center">
                            <option value="O" disabled selected>Selecione Tipo De Vehiculo</option>
                            <option value="Automovil">Automovil</option>
                            <option value="Motocicleta">Motocicleta</option>
                        </select>
                        <!--<input type="text" name="tipo" id="tipo" class="form-control input-sm" 
                                    value="{{$vehiculo->tipo}}">-->
                    </div>


                    <div class="form-group">
                        <input type="text" name="placa" id="placa" class="form-control input-sm" value="{{$vehiculo->placa}}" style="text-align: center">
                    </div>


                    <div class="form-group">
                        <input type="number" name="modelo" id="modelo" class="form-control input-sm" value="{{$vehiculo->modelo}}" style="text-align: center">
                    </div>
            </div>
        </div>

        <div class="form-group" style="text-align: center">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{ route('vehiculo.index') }}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></a>
        </div>
    </div>
</div>
@endsection