<!DOCTYPE html>
<html lang="en">
<head>
    <title>Certificate</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div class="certificate" style="display: flex;
    align-items: center;
    justify-content: center;
{{--    background: no-repeat url({{url('images/background.jpg')}});--}}
    background: no-repeat url("{{public_path('background.jpg')}}");
    height: 100vh;">
<img style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; width: 100vw; height: 100vh;" src="{{public_path('background.jpg')}}" />
    <div class="certificate__container" style=" width: 90%; z-index: 5;
    margin: 0 auto;
            height: 80%;
            padding: 80px;
            box-sizing: border-box;
            text-align: center;
            background: rgba(256, 256, 256, 0.5);
            display: flex;
            align-items: stretch;
            flex-direction: column;">
        <div class="certificate__content" style="flex-grow: 1;">
            <h1 class="certificate__title" style=" font-size: 60px;
            font-family: DejaVu Sans;
            font-weight: 700;
            letter-spacing: 8px;
            margin: 0 0 25px 0;">
               Сертификат
            </h1>
            <h2 class="certificate__second-title" style="font-size: 27px;
            font-family: 'DejaVu Sans', sans-serif;
            font-weight: 400;
            margin: 0 0 70px 0;
            letter-spacing: 4px;">ОБ ОКОНЧАНИИ СТАЖИРОВКИ {{$name}} {{$surname}}</h2>
            <div class="certificate__text" style="font-size: 25px;
            font-family: 'DejaVu Sans', sans-serif;
            font-weight: 400;
            color: #6c9ed8;
            max-width: 600px;
            margin: 0 auto;">Настоящим удостоверяется, что</div>
            <div class="certificate__info" style=" font-style: italic;
            font-size: 70px;
            margin: 10px 0;">{{$course}}</div>
            <div class="certificate__text" style="font-size: 25px;
            font-family: 'DejaVu Sans', sans-serif;
            font-weight: 400;
            color: #6c9ed8;
            max-width: 600px;
            margin: 0 auto;">Завершил 7-дневную стажировку по профессии {{$course}} в компании Jaryq</div>
        </div>

        <div class="certificate__bottom" style="flex-shrink: 0;">
            <div class="certificate__signature" style="font-size: 50px;
            width: 300px;
            margin: 0 auto 10px;
            padding: 0 30px 10px 30px;
            font-style: italic;
            border-bottom: 2px solid #000;">Jaryq</div>
            <div class="certificate__image">
                <img src="{{public_path('logo.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

</body>
</html>
