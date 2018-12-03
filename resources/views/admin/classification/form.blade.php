<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', '名称', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::input('text', 'name', null, [
      'class' => 'form-control',
      'placeholder' => '名称',
    ]) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', '状态', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-10">
        <div class="checkbox">
    @foreach($status as $value=>$name)
            @if($value==1)
            <label>{!! Form::radio('status', $value,true) !!} {{$name}}</label>
            @else
            <label>{!! Form::radio('status', $value) !!} {{$name}}</label>
            @endif
    @endforeach
</div>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '保存', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('cms.audio_tag.index', []) }}" class="btn btn-primary">返回列表</a>
    </div>
</div>