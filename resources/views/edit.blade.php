@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar datos de Usuario
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('categoria.update', $categoriesid->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Nombre:</label>
              <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $categoriesid->Nombre }}"/>
          </div>
          <div class="form-group">
              <label for="cases">Edad:</label>
              <input type="text" class="form-control" id="Edad" name="Edad" value="{{ $categoriesid->Edad }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection