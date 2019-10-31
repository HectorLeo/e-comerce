@extends('layouts.app-usu')
@section('titulohome')
Inicio
@endsection
@section('iniciarsesion')
<li><a href="#"><i class="fa fa-user-o"></i> {{session()->get('email') ?? 'Invitado'}} </a> <a href="{{route('logoutC')}}" class="btn btn-xs btn-danger">Salir</a></li>
@endsection
{{  Auth::guest() }}
@section('content')
<!-- Aqui va ell contenido> 
@endsection