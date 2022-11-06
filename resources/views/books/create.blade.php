@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
        <div class="card">
            <div class="card-header text-white" style="background-color: #2f3332;">
                <h4>
                    Create Book
                    <a href="{{ route('books.index') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Book ID</strong>
                        <input type="text" name="bid" class="form-control" placeholder="Book ID">
                        @error('bid')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Book Name</strong>
                        <input type="text" name="bname" class="form-control" placeholder="Book Name">
                        @error('bname')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Type</strong>
                        <input type="text" name="type" class="form-control" placeholder="Type">
                        @error('type')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Price</strong>
                        <input type="text" name="price" class="form-control" placeholder="Price">
                        @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Book Image</strong>
                        <input type="file" name="image" class="form-control" placeholder="Image">
                        @error('image')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
        </div>
        
    </div>
</body>
</html>
@endsection