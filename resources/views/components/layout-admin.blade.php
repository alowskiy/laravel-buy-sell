@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

{{$header}}

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
</style>
