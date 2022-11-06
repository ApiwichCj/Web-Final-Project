@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80');
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
                font-family: 'Open Sans', Arial, sans-serif;
                position: relative;
                overflow: hidden;  
                width: 100%;
                color: #000;
                background-color: #ffffff;
                opacity: 0.7;
            }
            .title {
                font-size: clamp(24px, 5vw, 84px);
                color: #000;
            }
            .links1 > a {
                color: #fff;
                padding: 0 25px;
                font-size: clamp(6px, 5vw, 13px);
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links2 > a {
                color: #000;
                padding: 0 25px;
                font-size: clamp(6px, 2.5vw, 13px);
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
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                Bookstore management system
                </div>

                <div class="links2">
                    <a href="{{ route('books.index') }}">Book List</a>
                    <a href="{{ route('employees.index') }}">Employee List</a>
                    <a href="{{ route('bsbranchs.index') }}">BookStore Branch</a>
                    
                </div>
            </div>
        </div>
    </body>
</html>
@endsection