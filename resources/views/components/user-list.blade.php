@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<table>
    <tr>
        <th>
            uid
        </th>
        <th>
            name
        </th>
        <th>
            created_at
        </th>
        <th>
            active
        </th>

    </tr>
    @foreach ($users as $user)
<tr>
    <td>
        {{$user->id}}
    </td>
    <td>
        {{$user->name}}
    </td>
    <td>
        {{$user->created_at}}
    </td>
    <td>
        {{$user->active}}
    </td>
     <td>
 @if ($user->active === 1)
 <a href="/ban/{{$user->id}}">Заблокировать</a>
@else
<a href="/unban/{{$user->id}}">Разблокировать</a>

 @endif
    </td>
    <td>
        <a href="/ch/{{$user->id}}">Изменить</a>
    </td>
</tr>
    @endforeach

</table>

<style>
            .alert{
            text-align: center;
            width: 100%;
            color: white;
        }
        .alert-success{
            background: rgb(84, 209, 84);
        }
</style>
