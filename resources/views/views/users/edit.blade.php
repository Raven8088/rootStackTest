@extends('layouts.app')

@section('content')
<div class="panel panel-default">
                <div class="panel-heading">
                   Edit User
                </div>
                <div class="panel-body fom-create">
                    {!!Form::model($user,['route'=>['users.update',$user->id],
                     'method'=>'PUT','files'=>true])!!}

                        @include('users.partials.phorm')
                        
                    {!!Form::close()!!}
                </div>
                
            </div>

@endsection
