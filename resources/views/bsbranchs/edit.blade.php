@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit BookStore Branch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
        <div class="card">
            <div class="card-header text-white" style="background-color: #2f3332;">
                <h4>
                    Edit BookStore Branch Data
                    <a href="{{ route('bsbranchs.index') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('bsbranchs.update', $bsbranch->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>BookStore ID</strong>
                        <input type="text" name="bsid" value="{{ $bsbranch->bsid }}" class="form-control" placeholder="BookStore ID">
                        @error('bsid')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>BookStore Branch</strong>
                        <input type="text" name="bsbranch" value="{{ $bsbranch->bsbranch }}" class="form-control" placeholder="BookStore Branch">
                        @error('bsbranch')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Location</strong>
                        <input type="text" name="bslocation" value="{{ $bsbranch->bslocation }}" class="form-control" placeholder="Location">
                        @error('bslocation')
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