@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-error">
    {{session('error')}}
</div>
@endif
<x-header-u-ser></x-header-u-ser>

{{$slot}}

<style>
        .alert{
        text-align: center;
        width: 100%;
        color: white;
    }
    .alert-success{
        background: rgb(84, 209, 84);
    }
    .alert-error{
        background: red
    }
</style>
