
<div class="form-group">
    {!!Html::decode(Form::label('file', 'Subscribers File:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::file('file', null, ['class'=>'form-control file', 'required'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('country_id', 'Country:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::select('country_id', $countries->pluck('name', 'id'), (isset($user) and !empty($user->client->country))?$user->client->country_id:230, ['class'=>'form-control', 'required'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('groupz', 'Groups:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::select('groupz[]', $groups->pluck('name', 'id'), isset($user)?$user->subscriber->groupz:null,
        ['class'=>'form-control select2 country', 'multiple', 'required'])!!}
        <span class="help-block">Select all Groups</span>
    </div>
</div>