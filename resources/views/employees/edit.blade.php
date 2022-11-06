@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
        <div class="card">
            <div class="card-header text-white" style="background-color: #2f3332;">
                <h4>
                    Edit Employee Data
                    <a href="{{ route('employees.index') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Employee ID</strong>
                        <input type="text" name="eid" value="{{ $employee->eid }}" class="form-control" placeholder="Employee ID">
                        @error('eid')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Employee Name</strong>
                        <input type="text" name="fullname" value="{{ $employee->fullname }}" class="form-control" placeholder="Employee FullName">
                        @error('fullname')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <label type="text" for="bsbranch" name="bsbranch" class="form-label">BookStore Branch</label>
                            <select id="bsbranch" name="bsbranch" class="form-select">
                                <option selected>{{ $employee->bsbranch }}</option>
                                @foreach ($bsbranchs as $branch)
                                  <option value="{{ $branch['bsbranch'] }}">{{ $branch['bsbranch'] }}</option> 
                                @endforeach
                            </select>
                        @error('bsbranch')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Email</strong>
                        <input type="text" name="email" value="{{ $employee->email }}" class="form-control" placeholder="Employee Email">
                        @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Phone</strong>
                        <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" placeholder="Phone Number">
                        @error('phone')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group my-2">
                        <strong>Employee Profile Picture</strong>
                        <input type="file" name="picture" value="{{ $employee->picture }}" class="form-control" placeholder="Profile Picture">
                        @error('picture')
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