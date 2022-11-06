@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Info</title>
</head>
<body>
  <div class="position-relative">
    <div class="position-absolute top-0 start-50 ">
      <img src="{{ asset('uploads/employees/'. $employee['picture']) }}" style="height:300px;width:300px">
    </div>
  </div>
    <div class="container">
        <h1>Employee Infomation</h1>
        <form class="row g-3">
            <div class="col-md-2">
              <label for="eid" class="form-label">Employee ID</label>
              <input type="text" readonly class="form-control" id="eid" name="eid" value="{{ $employee['eid']}}">
            </div>
            <div class="col-md-3">
              <label for="fullname" class="form-label">Employee Name</label>
              <input type="text" readonly class="form-control" id="fullname" name="fullname" value="{{ $employee['fullname']}}">
            </div>

            <div class="row my-2">

            <div class="col-md-3">
                <label for="bsbranch" class="form-label">BookStore Branch</label>
                <input type="text" readonly class="form-control" id="bsbranch" name="bsbranch" value="{{ $employee['bsbranch']}}">
            </div>
            <div class="col-2">
              <label for="type" class="form-label">Email</label>
              <input type="text" readonly class="form-control" id="email" name="email" value="{{ $employee['email']}}">
            </div>
        
          </div>
          <div class="row my-2">
            <div class="col-2">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" readonly class="form-control" id="phone" name="phone" value="{{ $employee['phone']}}">
            </div>
          </div>

          
            
            <div class="col-12">
                <a href="{{ route('employees.index') }}" class="btn btn-primary my-2">Back</a>
            </div>
          </form>
    </div>
</body>
</html>
@endsection