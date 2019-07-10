<div class="rtl text-right form-group{{ $errors->has($name) ? ' has-danger' : '' }}">


    <label class="form-control-label" for="input-{{$name}}">{{$title}} : </label>
    <select name="{{$name}}" {{isset($type)==true?"multiple":""}} id="input-{{$name}}"
            class="form-control form-control-alternative{{ $errors->has($name) ? ' is-invalid' : '' }}">
            {{$slot}}
    </select>
    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif


</div>
