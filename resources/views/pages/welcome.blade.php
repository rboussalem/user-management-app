@extends('layouts.app')

@section('content')

<div class="container mt-2">

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading font-weight-bold">Bonjours!</h4>
        <hr>
        <p>
            Mini application de gestion des utilisateur développé par les outils:
        </p>
        <hr>
        <p class="mb-0">html, css bootstrap, laravel.</p>
    </div>

    <hr>

    <div class="alert alert-secondary" role="alert">
        <h4 class="alert-heading font-weight-bold">Mot de pass Des Comptes</h4>
        <hr>
        <p class="mb-0"> <span class="font-weight-bold">Mot de pass : </span> password</p>
    </div>

    <hr>

    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading font-weight-bold">Réalisé Par : BOUSSALEM Radouane</h4>
        <hr>
        <ul class="px-5 nav flex-column">
            <li class="py-1 nav-item">
                <span class="font-weight-bold">Email : </span> boussalem.radouane@gmail.com
            </li>
            <li class="py-1 nav-item">
                <span class="font-weight-bold">Linkdin : </span> <a href="https://www.linkedin.com/in/radouane-boussalem-663567205/">Cliquer Ici</a> 
            </li>
            <li class="py-1 nav-item">
                <span class="font-weight-bold">Portfolio : </span> <a href="https://sites.google.com/view/r-boussalem/">Cliquer Ici</a> 
            </li>
        </ul>
    </div>

    <hr>

    <div class="alert alert-warning font-weight-bold" role="alert">
        NB : Laravel v8.45.1 (PHP v7.4.19)
    </div>
</div>
@endsection