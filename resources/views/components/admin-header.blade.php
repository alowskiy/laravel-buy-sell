
<admin-header>
    <x-slot:header></x-slot:header>
        <a href="/posts">Обьявления</a>
        <a href="/user/{{$uid}}">Профиль</a>
        <a href="/users/">Пользователи</a>
        <form action="/search/" method="post">
            @csrf
        <select name="cats">
            @foreach($categories as $category)
            @if ($category->parent_id === NULL)
            <option class="parent" disabled >  <p>{{  $category->name}}</p></option>
            @else
            <option value="{{$category->id}}">  <p>{{  $category->name}}</p></option>

            @endif

            @endforeach

        </select>
        <input type="submit">
    </form>

</admin-header>
