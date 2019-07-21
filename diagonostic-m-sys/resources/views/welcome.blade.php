<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="container">
        <div class="row">

            <table class="table table-bordered">
                <tr>
                    <td>Id</td>
                    <td>category_id</td>
                    <td>pranker_id</td>
                    <td>title</td>
                    <td>description</td>
                    <td>Number</td>
                </tr>
                @foreach($posts as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->category->category_name}}</td>
                        <td>{{$user->pranker_id}}</td>
                        <td>{{$user->title}}</td>
                        <td>{{$user->description}}</td>
                        @if($user->phone)
                            <td>{{$user->phone->number}}</td>
                        @endif
                    </tr>
                @endforeach
            </table>
            {{--<table class="table table-bordered">--}}
                {{--<tr>--}}
                    {{--<td>Id</td>--}}
                    {{--<td>Name</td>--}}
                    {{--<td>Email</td>--}}
                    {{--<td>Number</td>--}}
                {{--</tr>--}}
                {{--@foreach($users as $user)--}}
                    {{--<tr>--}}
                        {{--<td>{{$user->id}}</td>--}}
                        {{--<td>{{$user->name}}</td>--}}
                        {{--<td>{{$user->email}}</td>--}}
                        {{--@if($user->phone)--}}
                            {{--<td>{{$user->phone->number}}</td>--}}
                        {{--@endif--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
            {{--</table>--}}
        </div>
    </div>
</div>
</body>
</html>
