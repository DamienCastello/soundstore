@php
$multiple ??= false;
$entities ??= [];
$pluckedIds ??= [];
$label ??= '';
$class ??= null;
$name ??= '';
$id ??= '';
$oldValue ??= '';
@endphp


@if($multiple)
    <div @class(['form-group', $class])>
    <label for="{{$id}}">{{$label}}</label>
    <select id="{{$id}}" name="{{$name}}" class="form-control @error($name) is-invalid @enderror" multiple>
        @foreach($entities as $entity)
            <option @selected($pluckedIds->contains($entity->id)) value="{{$entity->id}}">{{$entity->name}}</option>
        @endforeach
    </select>
    @error($name)
        {{ $message }}
    @enderror
</div>
@else
    <div @class(['form-group', $class])>
        <label for="{{$id}}">{{$label}}</label>
        <select id="{{$id}}" name="{{$name}}" class="form-control @error($name) is-invalid @enderror">
            @foreach($entities as $entity)
                <option @selected(old($name, $oldValue) == $entity->id) value="{{$entity->id}}">{{$entity->name}}</option>
            @endforeach
        </select>
        @error($name)
            {{ $message }}
        @enderror
    </div>
@endif

