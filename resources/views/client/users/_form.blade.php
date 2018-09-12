
<div class="form-group">
    {!!Html::decode(Form::label('name', 'Name:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('name', null, ['class'=>'form-control', 'required', 'placeholder'=>'Full Name'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('phone', 'Cell Number:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('phone', null, ['class'=>'form-control', 'required', 'min'=>0, 'pattern'=>'[0-9]{10,14}', 'placeholder'=>'e.g. 0777777777'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('email', 'Email:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::email('email', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'client@example.com'])!!}
    </div>
</div>

<hr>

<div class="form-group">
    {!!Html::decode(Form::label('username', 'Username:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('username', null, ['class'=>'form-control', 'required', 'min'=>5])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('password', 'Password:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::password('password', ['class'=>'form-control', !isset($user)?'required':null, 'min'=>5])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('password_confirmation', 'Confirm Password:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::password('password_confirmation', ['class'=>'form-control', !isset($user)?'required':null, 'min'=>5])!!}
    </div>
</div>

<hr>

@include('client.users._privileges')