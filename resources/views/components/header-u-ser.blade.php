<header>
        Обьявления
        @auth
        <a href="/user/{{$uid}}">Профиль</a>
        <a href="/create/category">Создать обьявление</a>
        <a href="/sets/{{$uid}}">Настройки</a>

        @endauth
        @guest
            <a href="/register">Регистрация</a>
            <a href="/login">Вход</a>
        @endguest
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
    </header>
