@extends('layout/layout')

@section('contenu')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <h1>Entrer vos donnés</h1>
    <div class=" w-50">
    <form method="POST" action="{{url('employe')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" aria-describedby="text" name="name">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" aria-describedby="lname" name="lname">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
        </div>
       
        <button type="submit" class="btn btn-primary">Insert</button>
    </form>

</div>
@endsection