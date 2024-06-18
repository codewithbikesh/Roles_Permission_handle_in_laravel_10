{{-- @props([
    'message'
]) --}}
<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>
   <h6>{{$message}}</h6>
</div>