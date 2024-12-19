@if(session('error'))
<div class="alert alert-error">
    {{session('error')}}
</div>
@endif

<div class="form">
<p>Вход</p>
    <form action="log" method="post">
@csrf

        <input type="text" name="email" placeholder="Enter your email">

        <input type="password" name="password" placeholder="Enter your password">
        <input type="submit" value="Зарегистрироваться">
    </form>
</div>
<style>
    .alert{
    text-align: center;
    width: 100%;
    color: white;
}
.alert-success{
    background: rgb(84, 209, 84);
}
.alert-error{
    background: red
}
</style>
