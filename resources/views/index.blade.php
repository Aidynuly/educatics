<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&family=Montserrat:wght@400;700&display=swap');
    </style>
</head>
<body>
<div class="certificate" style="display: flex;
    align-items: center;
    justify-content: center;
    background: no-repeat url({{url('images/background.jpg')}});
    height: 100vh;">
    <div class="certificate__container" style=" width: 90%;
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
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            letter-spacing: 8px;
            margin: 0 0 25px 0;">СЕРТИФИКАТ</h1>
            <h2 class="certificate__second-title" style="font-size: 27px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            margin: 0 0 70px 0;
            letter-spacing: 4px;">ОБ ОКОНЧАНИИ СТАЖИРОВКИ {{$name}} </h2>
            <div class="certificate__text" style="font-size: 25px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            color: #6c9ed8;
            max-width: 600px;
            margin: 0 auto;">Настоящим удостоверяется, что</div>
            <div class="certificate__info" style=" font-style: italic;
            font-size: 70px;
            margin: 10px 0;">{{$course}}</div>
            <div class="certificate__text" style="font-size: 25px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            color: #6c9ed8;
            max-width: 600px;
            margin: 0 auto;">Завершил 7-дневную стажировку по профессии "Экономист" в компании Jaryq</div>
        </div>

        <div class="certificate__bottom" style="flex-shrink: 0;">
            <div class="certificate__signature" style="font-size: 50px;
            font-family: 'Courgette';
            width: fit-content;
            margin: 0 auto 10px;
            padding: 0 30px 10px 30px;
            font-style: italic;
            border-bottom: 2px solid #000;">Jaryq</div>
            <div class="certificate__image">
                {{--                <img src="images/logo.png" alt="">--}}
                <img src="{{url('images/logo.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

</body>
</html>
