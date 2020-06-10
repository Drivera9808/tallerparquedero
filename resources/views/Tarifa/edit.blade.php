@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3 style="text-align: center">Actualizar Tarifa</h3>
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
                <form method="POST" action="{{ route('tarifa.update',$tarifa->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">                   

                    
                    <div class="form-group">
                        <label for="Role">Tipo Vehiculo ID</label>
                        <input readonly name="tipo_vehiculo_id" id="tipo_vehiculo_id" class="form-control input-sm" value="{{$tarifa->tipo_vehiculo_id}}" style="text-align: center">
                    </div>


                    <div class="form-group">
                        <label for="Role">Tarifa Por Hora</label>
                        <input type="number" name="valor" id="valor" class="form-control input-sm" value="{{$tarifa->valor}}" style="text-align: center">
                    </div>


                    <div class="form-group">
                        <label for="Role">Estado</label>
                        <input type="number" name="estado" id="estado" class="form-control input-sm" value="{{$tarifa->estado}}" style="text-align: center">
                    </div>
            </div>
        </div>

        <div class="form-group" style="text-align: center">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{ route('tarifa.index') }}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></a>
        </div>
    </div>
</div>
@endsection