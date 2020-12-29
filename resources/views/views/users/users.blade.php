@extends('layouts.app')

@section('content')
<div class="container-fluid mt-2">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">List Users</h3>

            </div>
            <div class="col-lg-12" >
              
              <a href="{{route('users.create')}}" >
                <i class="fas fa-plus-circle fa-2x"></i>
              </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Home Phone</th>
                    <th scope="col">Work Phone</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Type Studen</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
               <tbody>
              @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->home_phone}}</td>
                    <td>{{$user->work_phone}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->type_id}}</td>
                    <td width=""> 
                    <button class="material-icons btn-transparenrte " style="float: right;"><a href="{{route('users.edit',$user->id)}}" class="">
                      <i class="fas fa-edit fa-2x"></i>
                    </a></button>
                  </td>

                  <td width=""> 
                    {!! Form::open(['route'=>['users.destroy',$user->id],
                    'method'=>'DELETE'])!!}
                    <button class="material-icons btn-transparenrte " style="float: right;">
                      <i class="fas fa-trash-alt fa-2x"></i>
                    </button>
                    {!!Form::close()!!}
                    
                  </td>
                  </tr>
              @endforeach
               </tbody>
              </table>
            
            </div>
            <div class="col-md-12 col-lg-12" style="margin-top: 2%;"> {{$users->render()}}</div>
            </div>
          </div>
        </div>
      </div>
   
     
   
@endsection
