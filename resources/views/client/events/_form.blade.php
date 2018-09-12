@php
    $client_groups = \App\Helpers\ClientHelper::getInstance()->client()->groupz;
     $selected_groups = null;
    if(isset($event)){
        $selected_groups = $event->groupz;
        if(empty(array_diff($client_groups, $selected_groups))){
            $selected_groups = ['all'];
        }
    }
@endphp
<div class="form-group">
    {!!Html::decode(Form::label('title', 'Title:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-6">
        {!!Form::text ('title', null, ['class'=>'form-control', 'required', 'placeholder'=>'Title'])!!}
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3">Date(s):<span class="required"> * </span></label>
    <div class="col-md-6">
        {!!Form::text ('daterange', isset($event)?$formatted_date:null, ['class'=>'form-control', 'required', 'placeholder'=>'dates...'])!!}
        <span><em style="font-size: 12px">Start Date - End date</em></span>
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('groupz', 'Groups:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-5">
        {!!Form::select('groupz[]', ['all'=>'All Groups']+$groups->pluck('name', 'id')->toArray(),
        $selected_groups, ['class'=>'form-control select2', 'multiple', 'required'])!!}
        <span class="help-block">Select all Groups</span>
    </div>
</div>

<div class="form-group">
    {!!Html::decode(Form::label('details', 'Details:<span class="required"> * </span>', ['class'=>'control-label col-md-3']))!!}
    <div class="col-md-7">
        {!!Form::textarea('details', null, ['class'=>'form-control', 'rows'=>'5', 'required', 'placeholder'=>'Details...'])!!}
    </div>
</div>