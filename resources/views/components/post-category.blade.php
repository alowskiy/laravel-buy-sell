<x-layout>
    <x-slot:header>
      <p>
        Выберите категорию</p>
    </x-slot:header>
    <form action="create" method="post">
        @csrf
      @foreach ($categories as $category)


        <label>
         <input type="radio" name="cat" id="" value="{{$category->id}}">

            {{$category->name}}
            
        </label>
      @endforeach
      <input type="submit" value="Далее">
    </form>

</x-layout>