<div class="form-group">
    <label for="{{ $name }}">{{ $title }}</label>
    <input id="{{ $name }}" type="text" name="{{ $name }}"
        class="form-control" placeholder="Enter {{ $title }}"Add commentMore actions
        value="@if(isset($data)) {{$data}} @else {{ old($name) }}@endif" />
    @error($name)
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>