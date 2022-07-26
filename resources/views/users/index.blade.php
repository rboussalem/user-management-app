@extends('pages.adminpage')

@section('main')
<div class="clearfix">
    <div class="float-left"><h3>Liste Des Utilisateurs</h3></div>
    <div class="float-right">
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Filtrer Par
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item" href="{{route('users.sortbyrole', ['role'=>'guest'])}}">Visiteur</a>
              <a class="dropdown-item" href="{{route('users.sortbyrole', ['role'=>'user'])}}">Utilisateur</a>
              <a class="dropdown-item" href="{{route('users.sortbyrole', ['role'=>'admin'])}}">Administrateur</a>
              <a class="dropdown-item" href="{{route('users.sortbyrole', ['role'=>'default'])}}">Default</a>
            </div>
          </div>
    </div>
</div>

<hr>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="col-4">Nom</th>
        <th scope="col" class="col-3">Rôle</th>
        <th scope="col" class="text-center">Consulter</th>
        <th scope="col" class="text-center">Gérer</th>
        <th scope="col" class="text-center">Supprimer</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->name}}</th>
            <td>
                @if ($user->role === 'admin')
                    Administrateur
                @elseif ($user->role === 'user')
                    Utilisateur
                @else
                    Visiteur
                @endif
            </td>
            <td class="text-center">
                <a href="{{route('users.show', ['user'=>$user->id])}}">
                    <i class="far fa-eye"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="{{route('users.edit', ['user'=>$user->id])}}">
                    <i class="fas fa-pen-square"></i>
                </a>
            </td>    
            <td class="text-center py-1">
                <form method="POST" action="{{route('users.destroy', ['user'=> $user->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn text-primary"><i class="fas fa-user-times"></i></button>
                </form> 
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
<hr>
<hr>
<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
@endsection