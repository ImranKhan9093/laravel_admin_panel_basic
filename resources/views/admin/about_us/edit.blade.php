@extends('layouts.master')


@section('title')
About us edit

@endsection

@section('content')

     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">About us edit</h4>
                    <form action="{{ route('admin.aboutus.update',$aboutus) }}" method="POST">
                        @csrf
                        @method('PUT')
                          <div class="modal-body">
                          
                              <div class="mb-3">
                                  <label for="title" class="col-form-label">Title:</label>
                                  <input type="text" class="form-control" id="title" name="title" value="{{ $aboutus->title }}">
                                  @error('title')
                                      <div class="alert alert-danger">
                                          <span>{{ $message }}</span>
                                      </div>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label for="subtitle" class="col-form-label">Subtitle:</label>
                                  <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $aboutus->subtitle }}">
                                  @error('subtitle')
                                      <div class="alert alert-danger">
                                          <span>{{ $message }}</span>
                                      </div>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label for="description" class="col-form-label">Description:</label>
                                  <textarea class="form-control" id="description" name="description" ">{{ $aboutus->description }}</textarea>
                                  @error('description')
                                      <div class="alert alert-danger">
                                          <span>{{ $message }}</span>
                                      </div>
                                  @enderror
                              </div>
                          
                          </div>
                          <div class="modal-footer">
                              <a href="{{ route('admin.aboutus.index') }}" class="btn btn-secondary">Cancel</a>
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection