<table>
    <thead>
    <tr>
        <th>Тип</th>
        <th>Возраст</th>
        <th>Логин</th>
        <th>Номер</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Школа</th>
        <th>Город</th>
        <th>Дата регистрации</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                @if($user->type == 'children')
                    Ученик
                @else
                    Родитель
                @endif
            </td>
            <td>{{$user->age}}</td>
            <td>{{$user->login}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->surname}}</td>
            <td>{{$user->school_name}}</td>
            <td>{{App\Models\Translate::whereId((\App\Models\City::whereId($user->city_id)->value('title')))->value('ru')}}</td>
            <td>{{$user->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
