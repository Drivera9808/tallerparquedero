@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>
                
                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form v-on:messageSent="addMessage":user="{{Auth::user()}}"></chat-form>
                </div>
            </div>
            <a href="{{url('home')}}" class="btn btn-info">Salir Del Chat <span class="glyphicon glyphicon-triangle-left"></span></a>
        </div>
    </div>
</div>
@endsection