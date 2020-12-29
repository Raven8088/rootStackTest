@extends('layouts.app')

@section('content')
<div class="card">
             
                
                    <div class="card-body">
                    {!!Form::open(['route'=>'users.store','files'=>true,'enctype'=>'multipart/form-data'])!!}
                     {{csrf_field()}}

                    @include('users.partials.phorm')

                    {!!Form::close()!!}
                </div>
               

            </div>

@endsection
