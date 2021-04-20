@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('tickets.create')}}">Ticket erstellen</a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('tickets.list')}}">Liste der Tickets</a>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
