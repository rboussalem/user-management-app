@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- chand side bar -->
        @include('component.sidebar')
        <!-- chand main -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-5">
            @include('component.alert')

            @yield('main')
        </main>
    </div>
</div>
@endsection