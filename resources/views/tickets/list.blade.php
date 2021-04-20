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
                        <th scope="col">Erledingt bis</th>
                        <th scope="col">Status</th>
                        <th scope="col">Autor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <th scope="row">{{$ticket->title}}</th>
                        <td>{{$ticket->description}}</td>
                        <td>{{\Carbon\Carbon::parse($ticket->due_date)->format('d-m-Y') }}</td>
                        <td>{{$ticket->status}}</td>
                        <td>{{Auth::user()->name}}</td>
                        <td><a href="{{url('tickets/edit/'.$ticket -> id)}}" class="btn btn-success">Bearbeiten</a></td>
                        <td><a href="{{url('tickets/assigned/'.$ticket->id)}}" class="btn btn-success">Zuweisen</a></td>
                        <td><a href="{{route('tickets.delete',$ticket->id)}}" class="btn btn-danger">Löschen</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
