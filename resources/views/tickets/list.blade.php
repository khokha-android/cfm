@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('tickets.create')}}">Ticket erstellen</a>
                        </li>
                    </ul>

                </div>
                <table class="table table-hover table-bordered table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Beschreibung</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <th scope="row">{{$ticket->title}}</th>
                        <td>{{$ticket->description}}</td>
                        <td>{{$ticket->date}}</td>
                        <td>{{$ticket->status}}</td>
                        <td><button type="button" class="btn btn-primary">Bearbeiten</button></td>
                        <td><button type="button" class="btn btn-primary">Zuweisen</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
