@extends('admin.layouts.app')
@section('content')
<!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Books</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Books</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Books</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('book.books.create') }}" class="btn btn-sm btn-neutral"><b>Create New Book</b></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Light table</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="id">Id</th>
                    <th scope="col" class="sort" data-sort="title">Title</th>
                    <th scope="col" class="sort" data-sort="isbn">ISBN</th>
                    <th scope="col">Quantity of Books Available</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach($books as $book)


                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->quantity_available }}</td>
                        <td>{{ $book->status }}</td>
                        <td>{{date('F j, Y g:i a',strtotime($book->created_at)) }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                            <form action="{{ route('book.books.destroy' , $book)}}" method="post">@csrf @method('delete')
                                <a href="{{ route('book.books.edit' , $book)}}" class="btn btn-primary btn-sm">Edit</a>
                                <button type="submit" class="btn btn-primary btn-sm">Archive</button>
                            </form>
                                &nbsp;&nbsp;&nbsp;<a href="{{ route('deleteBook',$book->id) }}" class="btn btn-primary btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    {{ $books->links() }}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
