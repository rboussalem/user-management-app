<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="name">Nom Et Prénom</label>
            <input type="text" class="form-control" name="name" value="{{old('name', $user->name?? null)}}">
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="date_of_birth">Date De Naissance</label>
            <input class="form-control" type="date" name="date_of_birth" value="{{old('date_of_birth', $user->date_of_birth?? null)}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="cin">CIN</label>
            <input type="text" class="form-control" name="cin" value="{{old('cin', $user->cin?? null)}}">
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="role">Choisir Le Role</label>
            <select class="form-control" id="role" name="role" value="{{old('role', $user->role?? null)}}">
                <option value="guest">Visiteur</option>
                <option value="user">Utilisatuer</option>
                <option value="admin">Administrateur</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{old('email', $user->email?? null)}}">
        </div>
    </div>
    
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="{{old('password', $user->password?? null)}}">
        </div>
    </div>
</div>

<hr>
@if ($errors->any())
    <div class="alert alert-warning py-4 font-weight-bold" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

