@extends('pages.adminpage')

@section('main')

<h3>Consultation Des Informations</h3>
<hr>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h4 class="display-4">Nom : {{$user->name}}</h4>
        <p class="lead">Date De Naissance : {{$user->date_of_birth}}</p>
        <p class="lead">Email : {{$user->email}}</p>
        <p class="lead">CIN : {{$user->cin}}</p>
        <p class="lead">
            Role :
            @if ($user->role === 'admin')
                Administrateur
            @elseif ($user->role === 'user')
                Utilisateur
            @else
                Visiteur
            @endif
        </p>
        <a href="{{route('users.edit', ['user'=>$user->id])}}" class="btn btn-primary">Modifier</a>
        <div class="d-inline-flex">
            <form method="POST" action="{{route('users.destroy', ['user'=> $user->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection
