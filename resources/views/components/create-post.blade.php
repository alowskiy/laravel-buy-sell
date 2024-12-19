<x-layout>

Создание обьявления
<form action="/upload" method="post" enctype="multipart/form-data">
@csrf

    <input type="text" name="title" placeholder="Введите название">
    <input type="text" name="p_desc" placeholder="Введите описание">

<input type="file" name="photo">

<select name="city" id="">
    @foreach ($cities as $state =>$cities2)
        @foreach ($cities2 as $city)


<option value="{{$state .'-'. $city}}">{{$state . ' ' . $city}}</option>
        @endforeach
    @endforeach




    </select>
    <select name="subCat">
        @foreach ($subCat as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>

     @endforeach
    </select>

    <input type="submit" >

</form>


</x-layout>
