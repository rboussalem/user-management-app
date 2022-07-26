@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="mt-5">Espace Visiteur</h3>
    <hr>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h4 class="display-4">Nom : {{Auth::user()->name}}</h4>
            <p class="lead">Date De Naissance : {{Auth::user()->date_of_birth}}</p>
            <p class="lead">Email : {{Auth::user()->email}}</p>
            <p class="lead">CIN : {{Auth::user()->cin}}</p>
            <p class="lead">
                Role : 
                @if (Auth::user()->role === 'admin')
                    Administrateur
                @elseif (Auth::user()->role === 'user')
                    Utilisateur
                @else
                    Visiteur
                @endif
                </p>
        </div>
    </div>
</div>

@endsection