
<x-layout>


    <div class="posts">

@foreach ($posts as $post)


<div class="card">
    <div class="post">
        <a href="/good/{{$post->id}}">
        <div class="post_photo"><img src="{{ asset('storage/' . $post->img_path) }}" alt=""></div>
        <div class="post_name"><p>{{$post->title}}</p></div>

        <div class="post_desc"><p>{{$post->p_text}}</p></div>
        <div class="post_city"><p>{{$post->city}}</p></div>


</a>
<a href="/delete/{{$post->id}}"><p>Удалить</p></a>
<a href="/changePost/{{$post->id}}"><p>Изменить</p></a>
</div>



</div>

@endforeach
</div>
</x-layout>

<style>
    .post{
        max-width: 400px;
    }
    .posts{
        display: grid;
grid-template-columns: 1fr 1fr 1fr 1fr;
grid-gap: 30px
    }
    .post>*{
    }
    .post_photo{
        max-width: 600px;
        max-height: 225px;

    }
    .post_photo>img{
        width: 100%;
        max-height: 205px;


    }
    a{
        text-decoration: none;
        color: black
    }
    .parent{
        font-weight: bold
    }
    .alert{
        text-align: center;
        width: 100%;
        color: white;
    }
    .alert-success{
        background: rgb(84, 209, 84);
    }
</style>


<script src="{{ asset('resources/js/app.js') }}"></script>
