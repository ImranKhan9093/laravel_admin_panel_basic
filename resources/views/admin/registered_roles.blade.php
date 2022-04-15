@extends('layouts.master')


@section('title')
Registererd roles
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Registered roles</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Name
                </th>
                <th>
                  Phone
                </th>
                <th>
                  Email
                </th>
                <th>
                  User Type
                </th>
                <th >
                  Edit
                </th>
                <th >
                  Delete
                </th>
              </thead>
              <tbody>
                  @foreach ( $users as $user )
                    <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    <td>
                        {{ $user->email }}
                    <td>
                    <td>
                        {{ $user->usertype }}
                    <td>
                        <a href="#" class="btn btn-success" >Edit user</a>
                    </td>
                    <td >
                        <a href="#" class="btn btn-danger">Delete user</a>
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
    
@endsection