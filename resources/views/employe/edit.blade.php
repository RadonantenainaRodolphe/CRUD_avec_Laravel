@extends('layout/layout')

@section('contenu')
    <h1>Changement des donnés</h1>
    <div class=" w-50">
    <form method="POST" action="{{route('employe.update',$employe->id)}}">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" aria-describedby="text" value="{{$employe->nom}}" name="name">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" aria-describedby="lname" name="lname" value="{{$employe->prenom}}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="{{$employe->email}}">
        </div>
       
        <button type="submit" class="btn btn-primary">Insert</button>
    </form>
</div>
@endsection