@extends('pages.adminpage')

@section('main')

<h3>Modifier L'utilisateur</h3>
<hr>
<form method="POST" action="{{route('users.update', ['user'=> $user->id])}}">
    @csrf
    @method('PUT')

    @include('users.partial.form')
    <hr>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

@endsection
