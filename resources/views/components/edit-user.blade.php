<form action="" method="POST">
    @csrf


<input type="text" placeholder="Имя" value="{{$user->name}}" name="name">
<input type="email" placeholder="email" value="{{$user->email}}" name="email">
<input type="submit" value="Изменить">
</form>
