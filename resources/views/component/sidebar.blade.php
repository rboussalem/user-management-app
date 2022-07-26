@if (Auth::check())
<div class="col-md-2 bg-dark sidebar rounded">
    <div class="sticky-top py-4 vh-md-100">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="text-light font-weight-bolder nav-link active">
                    <i class="fas fa-users"></i>
                    <span>Tous Les Utilisateurs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('users.create')}}" class="text-light font-weight-bolder nav-link">
                    <i class="fas fa-user-plus"></i>
                    <span>Ajouter Un Utilisateur</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('users.roles')}}" class="text-light font-weight-bolder nav-link">
                    <i class="fas fa-user-tag"></i>
                    <span>Rôles Des Utilisateurs</span>
                </a>
            </li>
        </ul>
    </div>
</div>
@endif