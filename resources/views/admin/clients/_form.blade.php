
<div class="form-body">
    <div class="form-group">
        {!!Html::decode(Form::label('name', 'Name:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
        <div class="col-md-5">
            {!!Form::text('name', null, ['class'=>'form-control', 'required'])!!}
        </div>
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('phone', 'Cell Number:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('phone', null, ['class'=>'form-control', 'required', 'min'=>0, 'placeholder'=>'e.g. 0777777777'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('email', 'Email:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::email('email', null, ['class'=>'form-control', 'required'=>'required', 'placeholder'=>'client@example.com'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('description', 'Description:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('description', isset($user)?$user->client->description:null,
        ['class'=>'form-control', 'required', 'placeholder'=>'Short description of your organisation',
        'min'=>5])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('country_id', 'Country:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::select('country_id', $countries->pluck('name', 'id'), (isset($user) and !empty($user->client->country))?$user->client->country_id:230, ['class'=>'form-control', 'required'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('logo', 'Logo:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">

        @if(isset($user) and !$user->client->logo==null)
            <div class="profile-userpic">
                <img src="{{ asset($user->client->logo) }}" alt="LOGO" class="logo-default"
                     style="width: 70px; height: 70px;"/>
            </div>
        @endif
        {!!Form::file('logo', null, ['class'=>'form-control'])!!}
        <span style="font-size: 12px; color: gray;">
            <em>
                @if(isset($user) and !$user->client->logo==null)
                    Choose another to replace if you want.
                @else
                    Attach your logo.
                @endif
            </em>
        </span>

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

