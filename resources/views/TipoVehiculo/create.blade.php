@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Tipo De Vehiculo</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'tipovehiculo','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}

        <div class="form-group">
            <label for="nombre">Tipo De Vehiculo:</label>
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre Tipo Vehiculo..." style="text-align: center">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripcion Del Tipo...." style="text-align: center">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{url('tipovehiculo')}}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></span></a>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection