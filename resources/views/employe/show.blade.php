@extends('layout/layout')

@section('contenu')

<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><a href="#"> {{$employe->nom}}</a></h5>
      <h5 class="card-subtitle mb-2 text-muted"> Prénom(s) : {{$employe->prenom}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Email : {{$employe->email}}</h6>
      <h3>

        <div class="row justify-content-evenly">
            <div class="col-4">
                <a href="{{route('employe.edit',$employe->id)}}"><i class="bi bi-pencil-fill"></i></a>
            </div>
            <div class="col-4">
                <form action="{{route('employe.destroy',$employe->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="bi bi-trash"></i></button>
                </form>
            </div>
          </div>
    </div>
</div>

@endsection