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
    <form method="POST" action="{{route('tickets.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
            @error('title')
            <small class="form-text text-danger"><strong>{{ $message }}</strong></small>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputDescription" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Date</label>
            <input type="datetime-local" name="date" class="form-control" id="exampleInputDescription" placeholder="Date">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputDescription" placeholder="Status">
        </div>
        <button type="submit" class="btn btn-primary">Ticket erstellen</button>
    </form>

</body>
</html>
