@extends('pages.adminpage')

@section('main')

<h3>Rôles Des Utilisateurs</h3>                
<hr>
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Nom</th>
        <th scope="col">Rôle</th>
        <th scope="col">Changer Rôle</th>
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
            <td>                        
                <div class="dropdown">
                    <button class="py-0 m-0 btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if ($user->role === 'admin')
                            Administrateur
                        @elseif ($user->role === 'user')
                            Utilisateur
                        @else
                            Visiteur
                        @endif
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item">
                            <form method="POST" action="{{route('users.updateroles', ['user'=>$user->id, 'role'=> 'admin'])}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn">Administrateur</button>
                            </form>
                        </div>
                        <div class="dropdown-item">
                            <form method="POST" action="{{route('users.updateroles', ['user'=>$user->id, 'role'=> 'user'])}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn">Utilisateur</button>
                            </form>
                        </div>
                        <div class="dropdown-item">
                            <form method="POST" action="{{route('users.updateroles', ['user'=>$user->id, 'role'=> 'guest'])}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn">Visiteur</button>
                            </form>
                        </div>
                    </div>
                </div>
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