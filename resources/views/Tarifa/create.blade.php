@extends ('layouts.layout')
@section ('contenido')
<div class="row" style="text-align: center">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva Tarifa</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form::open(array('url'=>'tarifa','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="form-group" >
            <label for="nombre">Tipo vehiculo</label>
            <select name="tipo_vehiculo_id" id="tipo_vehiculo_id" class="form-control selectpicker" data-live-search="true" required style="text-align: center">
                <option value="" disabled selected>Selecione Tipo Vehiculo</option>
                @foreach($tipo_vehiculo as $tipov)
                <option value="{{$tipov->id}}">{{ $tipov->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" class="form-control" placeholder="Valor Hora..." style="text-align: center">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" class="form-control" placeholder="Estado: 1.Activo 2.Inactivo." style="text-align: center">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>
            <button class="btn btn-danger" type="reset">Cancelar <span class="glyphicon glyphicon-remove-circle"></span></button>
            <a href="{{url('tarifa')}}" class="btn btn-info">Atrás <span class="glyphicon glyphicon-triangle-left"></span></a>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection