@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Info</title>
</head>
<body>
  <div class="position-relative">
    <div class="position-absolute top-0 start-50 ">
      <img src="{{ asset('uploads/books/'. $book['image']) }}" style="height:300px;width:200px">
    </div>
  </div>
    <div class="container">
        <h1>Book Infomation</h1>
        <form class="row g-3">
            <div class="col-md-2">
              <label for="bid" class="form-label">Boook ID</label>
              <input type="text" readonly class="form-control" id="bid" name="bid" value="{{ $book['bid']}}">
            </div>
            <div class="col-md-4">
              <label for="bname" class="form-label">Book Name</label>
              <input type="text" readonly class="form-control" id="bname" name="bname" value="{{ $book['bname']}}">
            </div>

            <div class="row my-2">
            <div class="col-2">
              <label for="type" class="form-label">Type</label>
              <input type="text" readonly class="form-control" id="type" name="type" value="{{ $book['type']}}">
            </div>
          </div>

          <div class="row my-2">
            <div class="col-2">
              <label for="price" class="form-label">Price</label>
              <input type="text" readonly class="form-control" id="price" name="price" value="{{ $book['price']}}">
            </div>
          </div>
            
            <div class="col-12">
                <a href="{{ route('books.index') }}" class="btn btn-primary my-2">Back</a>
            </div>
          </form>
    </div>
</body>
</html>
@endsection