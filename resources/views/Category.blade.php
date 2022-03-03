@extends('layout')

@section('content')
    <h1> Hola Mundo</h1>
    <form action="{{ route('categoria.store') }}" method="POST">
    @csrf
<input type="text" id="Nombre" name="Nombre" placeholder="Escriba aqui el nombre">
<input type="text" id="Edad" name="Edad" placeholder="Escriba aqui su edad">
<button type="submit">Enviar</button>

    </form>

    <h1>USUARIOS</h1>

<br>
<table> 
    <tr>
        <td>ID</td>    
        <td>Nombre</td>
        <td>Edad</td>
    </tr>
    @foreach ($categories as $iter)
    <tr>
        <td>{{$iter->id}}</td>
        <td>{{$iter->Nombre}}</td>
        <td>{{$iter->Edad}}</td>
      <form action="{{ route('categoria.destroy', $iter->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <td> <button type="submit">Borrar</button></td>
        </form>
        <form action="{{ route('categoria.edit', $iter->id) }}" >
        @csrf
        <td> <button type="submit">Editar</button></td>
        </form>
        
    </tr>
    @endforeach
</table>
<br>
<div id="app">
    <example-component></example-component>
</div>

