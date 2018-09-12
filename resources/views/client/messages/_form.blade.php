@php
    $client_groups = \App\Helpers\ClientHelper::getInstance()->client()->groupz;
     $selected_groups = null;
    if(isset($message)){
        $selected_groups = $message->groupz;
        if(empty(array_diff($client_groups, $selected_groups))){
            $selected_groups = ['all'];
        }
    }

@endphp
<div class="form-group">
    {!!Html::decode(Form::label('type', 'Type:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::select('type', $messageTypes, null,
        ['class'=>'form-control', 'required'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('title', 'Title:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::text('title', null, ['class'=>'form-control', 'required', 'placeholder'=>'Message Title'])!!}
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('groupz', 'Groups:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::select('groupz[]', ['all'=>'All Groups']+$groups->pluck('name', 'id')->toArray(), $selected_groups,
        ['class'=>'form-control select2 country', 'multiple', 'required'])!!}
        <span class="help-block">Select all Groups</span>
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('details', 'Details:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-7">
        {!!Form::textarea('details', null, ['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Details...'])!!}
    </div>
</div>
