<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>


<div class="content">
    <div class="title m-b-md">
        create ticket
    </div>
</div>
<form method="POST" action="{{route('tickets.editStore',$ticket->id)}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputTitle">Titel</label>
        <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{$ticket->title}}">
        @error('title')
        <small class="form-text text-danger"><strong>{{ $message }}</strong></small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputDescription">Beschreibung</label>
        <input type="text" name="description" class="form-control" value="{{$ticket->description}}">
    </div>
    <div class="form-group">
        <label for="exampleInputDescription">Erledigt bis</label>
        <input type="datetime" name="due_date" class="form-control"  value="{{$ticket->due_date}}">
    </div>
    <div class="form-group">
        <select class="form-control" name="status">
            @foreach(['Aufgabe','bearbeiten','Beenden'] AS $status)
                <option value="{{ $status }}" {{ old("selectStatus", $ticket->status) == $status ? "selected" : "" }}>{{ $status }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Änderungen speichern</button>
</form>

</body>
</html>
