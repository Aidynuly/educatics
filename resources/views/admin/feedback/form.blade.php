<div class="box box-info padding-1">
    <div class="form-group">
        <label for="name">Название</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введите Название:" value="{{$feedback->name}}">
        @if($errors->has('ru'))
            <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="surname">Фамилия</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="Введите Фамилия:" value="{{$feedback->surname}}">
        @if($errors->has('ru'))
            <span class="text-danger">{{$errors->first('surname')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="phone">Номер</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите Номер:" value="{{$feedback->phone}}">
        @if($errors->has('ru'))
            <span class="text-danger">{{$errors->first('phone')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="login">Логин</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Введите Логин:" value="{{$feedback->login}}">
        @if($errors->has('ru'))
            <span class="text-danger">{{$errors->first('login')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="age">Возраст</label>
        <input type="text" class="form-control" id="age" name="age" placeholder="Введите Возраст:" value="{{$feedback->age}}">
        @if($errors->has('ru'))
            <span class="text-danger">{{$errors->first('age')}}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="city_id">Город</label>
        <select class="form-control" id="city_id" name="city_id">
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{\App\Models\Translate::whereId($city->title)->value('ru')}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" id="status" name="status">
            <option value="in_process">В процессе</option>
            <option value="accept">Обработан</option>
            <option value="reject">Отклонен</option>
        </select>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Принять</button>
    </div>
</div>
