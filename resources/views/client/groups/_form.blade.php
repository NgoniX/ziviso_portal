<div class="form-group">
    {!!Html::decode(Form::label('name', 'Name:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('name', null, ['class'=>'form-control', 'required', 'placeholder'=>'e.g Grade 5 A'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('description', 'Description:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('description', null,
        ['class'=>'form-control', 'required', 'placeholder'=>'All Grade 5 A parents channel',
        'min'=>5])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('join_criteria', 'Joining Criteria:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::select('join_criteria', ['open'=>'Open', 'private'=>'Through approval'], null, ['class'=>'form-control', 'required'])!!}
        <span class="help-block" style="font-style: italic; font-size: 10px;"><strong>Open</strong> means that a subscriber can join the group and immediately start receiving messages. Alternatively, subscribers will need your approval to join a group.</span>
    </div>
</div>