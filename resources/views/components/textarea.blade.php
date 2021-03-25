<div class="form-group">
    <label for="{{$field}}">Subject</label>
    <textarea class="form-control" id="{{$field}}" name="{{$field}}" rows="3" placeholder="{{$placeholder ?? ''}}">
    @isset($value) {{old($field) ? old($field) : $value}} @else {{old($field)}} @endisset
    </textarea>
    @error($field)
    <div class="text-danger mt-2">
        {{ $message}}
    </div>
    @enderror
</div>