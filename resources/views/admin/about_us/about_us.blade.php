@extends('layouts.master')


@section('title')
About us

@endsection

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="card-title">New About us </h4>
          <button type="button" class="btn-close float-right" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        
      <form action="{{ route('admin.aboutus.store') }}" method="POST">
          @csrf
            <div class="modal-body">
            
                <div class="mb-3">
                    <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                    @error('title')
                        <div class="alert alert-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="subtitle" class="col-form-label">Subtitle:</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle">
                    @error('subtitle')
                        <div class="alert alert-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="col-form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                    @error('description')
                        <div class="alert alert-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
       </form>
      </div>
    </div>
  </div>
 {{-- Delete confirmation modal --}}
    <div class="modal fade" id="deleteModalPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
             <h5 class="card-title">Delete Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <form id="deleteAboutForm"  method="POST">
                @csrf
                @method('DELETE')
              
            
            <div class="modal-body">
              <h6 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h6>
              {{-- <input type="hidden" id="deleteModalAboutId"> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Confirm deletion</button>
          </div>
        </form>
        </div>
      </div>
    </div>
{{-- End delete confirmation modal --}}
 
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> About us
            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#exampleModal" id="showModal">Add</button>
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">


            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }} 
                </div>
            @endif


            <table id="dataTable" class="table">
              <thead class=" text-primary">
                <th>
                  Id
                </th>
                <th>
                  Title
                </th>
                <th>
                  Subtitle
                </th>
                <th>
                  Description
                </th>
                <th>
                 Edit
                </th>
                <th>
                 Delete
                </th>
              </thead>
              <tbody>

                @foreach ($aboutusData as $aboutus)
                    
                        <tr>
                            <td>
                                {{ $aboutus->id }}
                            </td>
                            <td>
                                {{ $aboutus->title }}
                            </td>
                            <td>
                                {{ $aboutus->subtitle }}
                            </td>
                            <td >
                                {{ $aboutus->description }}
                            </td>
                            <td>
                                <a href="{{ route('admin.aboutus.edit',$aboutus->id) }}" class="btn btn-success">Edit</a> 
                            </td>
                            <td>
                                <a id="deletebtn" href="javascript:void(0)" class="btn btn-danger" >Delete</a>
                            </td>
                        </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    

@endsection

@section('scripts')
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>

    $(document).ready( function () {
      $('#dataTable').DataTable();

     $('#dataTable').on('click','#deletebtn',function () {
         
         var tr = $(this).closest('tr');

       var data= tr.children('td').map(function(){

         return $(this).text();

       }).get();

      
      
      //  $('#deleteModalAboutId').val(data[0]);
       $('#deleteAboutForm').attr('action','/admin/aboutus/'+data[0]);
       $('#deleteModalPopup').modal('show');
     });
    });

</script>

@endsection