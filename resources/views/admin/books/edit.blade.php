@extends('admin.layouts.app')
@section('content')
<h2 id="form-controls">Edit Published Book</h2>
        <div class="ct-example">
          <div class="tab-content">
            <div id="form-controls-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="form-controls-component-tab">
                <form class="" enctype="multipart/form-data" method="POST" action="{{ route('book.books.update' , $book) }}">{{csrf_field()}} @method('put')

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Title</label>
                        <input type="text" id="input-username" class="form-control" name="title" value="{{ $book->title }}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">ISBN</label>
                        <input type="text" id="input-email" class="form-control" name="isbn" value="{{ $book->isbn }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Author</label>
                        <input type="text" id="input-first-name" class="form-control" name="author" value="{{ $book->author }}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Book Quantity</label>
                        <input type="number" id="input-last-name" class="form-control" name="quantity_available" value="{{ $book->quantity_available }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Status</label>
                        <select name="status"  class="form-control" required autofocus>
                            <option value="" disabled selected> Select One</option>
                            <option value="Active" {{ $book->status == 'Active' ? 'selected' : ''}}>Active</option>
                            <option value="Inactive" {{ $book->status == 'Inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm">Submit<button
                </div>

              </form>
            </div>
          </div>
        </div>
@endsection
