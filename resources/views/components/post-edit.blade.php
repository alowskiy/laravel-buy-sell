
<x-layout>
    <p>
        Изменение обьявления</p>

    <form action="" method="post" enctype="multipart/form-data">
    @csrf

        <input type="text" name="title" placeholder="Введите название" value="{{$post->title}}">
        <input type="text" name="p_desc" placeholder="Введите описание"  value="{{$post->p_text}}">





        <input type="submit" >

    </form>


    </x-layout>
