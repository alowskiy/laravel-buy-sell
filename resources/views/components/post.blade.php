<x-layout>


<x-slot:header>
    <p>{{$post->category->parent->name}}</p>
<p> {{$post->category->name}}</p>
   

 


</x-slot:header>
<div class="post">
    <div class="post_photo"><img src="{{ asset('storage/' . $post->img_path) }}" alt=""></div>
    <div class="post_name"><p>{{$post->title}}</p></div>

    <div class="post_desc"><p>{{$post->p_text}}</p></div>
    <div class="post_city"><p>{{$post->city}}</p></div>
    <div class="post_cr">Автор:  {{$post->userName->name}}</div>
       
</div>


</x-layout>
<style>
    .post{
        margin: 0 auto;
        width: fit-content;
    }
    .post>*{
        width: fit-content;
    }
    .post_photo{
        max-width: 600px;
    }
    .post_photo>img{
        width: 100%;
    }
</style>
