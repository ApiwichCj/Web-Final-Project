@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookstoreBranch List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>BookStoreBranch List</h2>
            </div>
            <div>
                <a href="{{ route('bsbranchs.create') }}" class="btn btn-success my-2">Add BookStore Branch</a>
                </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered table-dark table-hover">
            <tr>
                <th>BookStore ID</th>
                <th>BookStore Branch</th>
                <th>Location</th>
                <th>Action</th>
                
            </tr>
            @foreach($bsbranchs as $bsbranch)
            <tr class="table-warning">
                <td>{{ $bsbranch->bsid }}</td>
                <td>{{ $bsbranch->bsbranch }}</td>
                <td>{{ $bsbranch->bslocation }}</td>
                <td>
                    <form action="{{ route('bsbranchs.destroy',$bsbranch->id) }}" method="POST">
                        <a href="{{ route('bsbranchs.edit', $bsbranch->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $bsbranchs->links('pagination::bootstrap-5') !!}
    </div>

</body>
</html>
@endsection