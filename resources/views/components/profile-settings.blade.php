<x-layout>
<p>Изменить данные аккаунта</p>
<form action="" method="post">
    @csrf
        <input type="email" name="email" value="{{$user->email}}" placeholder="email">
        <input type="text" name="name" value="{{$user->name}}" placeholder="имя">
        <input type="password" name="password" value="" placeholder="Новый пароль" >
        <input type="submit" value="Изменить">

    </form>

</x-layout>
