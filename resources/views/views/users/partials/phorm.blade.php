{{Form::hidden('user_id',auth()->user()->id ,['class'=>'form-control','id'=>'user_id'])}}
<input type="hidden" name="_token" value="{{csrf_token()}}">


<div class="form-group row">
	{{Form::label('dni','DNI',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('dni',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'dni','name'=>'dni'])}}
</div>
<div class="form-group row">
	{{Form::label('name','Name',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('name',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'name','name'=>'name'])}}
</div>

<div class="form-group row">
	{{Form::label('last_name','Last Name',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('last_name',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'last_name','name'=>'last_name'])}}
</div>

<div class="form-group row">
	{{Form::label('home_phone','Home Phone',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('home_phone',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'home_phone','name'=>'home_phone'])}}
</div>


<div class="form-group row">
	{{Form::label('work_phone','Work Phone',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('work_phone',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'work_phone','name'=>'work_phone'])}}
</div>


<div class="form-group row">
	{{Form::label('phone','Phone',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('phone',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'phone','name'=>'phone'])}}
</div>


<div class="form-group row">
	{{Form::label('email','Email Address',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('email',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'email','name'=>'email'])}}
</div>


 <div class="form-group row">
	{{Form::label('type_id','Student Type',['class'=>'col-md-4 col-form-label text-md-right'])}}
	
	{{ Form::select('type_id',$type,null, ['class' => 'form-control col-md-6 col-lg-6 ']) }}
</div>

<div class="form-group row">
	{{Form::label('address','Address',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::text('address',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'address','name'=>'address'])}}
</div>

  <div class="form-group row">
	{{Form::label('password','Password ',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::Password('password',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'password','name'=>'password'])}}
</div>
  <div class="form-group row">
	{{Form::label('password-confirm','Confirmar Password ',['class'=>'col-md-4 col-form-label text-md-right'])}}
	{{Form::Password('password-confirm',null,['class'=>"form-control col-md-6 col-lg-6 col-md-pull-2 col-lg-pull-2",'id'=>'password-confirm','name'=>'password-confirm'])}}
</div>
<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
{{Form::submit('Guardar',['class'=>'btn-crear btn btn-primary'])}}
</div>
</div>