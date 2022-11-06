@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>BooK List</h2>
            </div>
            <div>
                <a href="{{ route('books.create') }}" class="btn btn-success my-2">Create Book</a>
                </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered table-dark table-hover">
            <tr>
                <th>Picture</th>
                <th>Book Name</th>
                <th>Book Type</th>
                <th>Action</th>
                
            </tr>
            @foreach($books as $book)
            <tr class="table-warning">
                <td><img src="{{ asset('uploads/books/'. $book->image) }}" style="height:100px;width:80px"></td>
                <td>{{ $book->bname }}</td>
                <td>{{ $book->type }}</td>
                <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $books->links('pagination::bootstrap-5') !!}
    </div>

</body>
</html>
@endsection