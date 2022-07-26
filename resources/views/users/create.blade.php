@extends('pages.adminpage')

@section('main')

<h3>Ajouter Un Utilisateur</h3>
<hr>
<form method="POST" action="{{route('users.store')}}">
    @csrf

    @include('users.partial.form')
    
    <hr>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

@endsection
