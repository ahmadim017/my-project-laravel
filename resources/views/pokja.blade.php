@extends('layouts.sbadmin')

@section('content')
<div class="card shadow mb-4">
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            Welcome Pokja, <span class="badge badge-primary">{{auth::user()->name}}</span> <br>
            You are logged in!
        </div>
    </div>
</div>  
@endsection