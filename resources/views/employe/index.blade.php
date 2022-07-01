@extends('layout/layout')

@section('contenu')
@if (session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
@endif

@if (session('employe_delete'))
    <div class="alert alert-danger">
      {{session('employe_delete')}}
    </div>
@endif
<div class="alert alert-secondary" role="alert">
    <p>On a {{$nb_employes}} employés</p>
</div>
   
<h1>Liste des employés</h1>
    <br>
    <table class="table">
      <thead>
        <th><button class="btn btn-primary"><a href="{{route('employe.create')}}" class="link-light"><i class="bi bi-plus"></i></a></button></th>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom(s)</th>
          <th scope="col">Email</th>
          <th scope="col">Modifier</th>
          <th scope="col">Supprimer</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employes as $employe)
        
          <tr>
              <th scope="row">{{$employe->id}}</th>
              <td>{{$employe->nom}}</td>
              <td>{{$employe->prenom}}</td>
              <td>{{$employe->email}}</td>
              <td><a href="{{route('employe.edit',$employe->id)}}"><i class="bi bi-pencil-fill"></i></a></td>
              <td><form action="{{route('employe.destroy',$employe->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-light"><i class="bi bi-trash"></i></button>
                  </form>
              </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection