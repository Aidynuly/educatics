<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <link rel="stylesheet" href="certificate/styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&family=Montserrat:wght@400;700&display=swap');
        * {
            padding: 0px;
            margin: 0px;
            border: 0px;
        }
        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        .certificate{
            display: flex;
            align-items: center;
            justify-content: center;
            background: no-repeat url(certificate/images/background.jpg);
            height: 100vh;
        }

        .certificate__container{
            width: 90%;
            height: 80%;
            padding: 80px;
            box-sizing: border-box;
            text-align: center;
            background: rgba(256, 256, 256, 0.5);
            display: flex;
            align-items: stretch;
            flex-direction: column;
        }

        .certificate__content{
            flex-grow: 1;
        }

        .certificate__bottom{
            flex-shrink: 0;
        }


        .certificate__title{
            font-size: 60px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            letter-spacing: 8px;
            margin: 0 0 25px 0;
        }

        .certificate__second-title{
            font-size: 27px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            margin: 0 0 70px 0;
            letter-spacing: 4px;
        }

        .certificate__text{
            font-size: 25px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            color: #6c9ed8;
            max-width: 600px;
            margin: 0 auto;
        }

        .certificate__info{
            font-style: italic;
            font-size: 70px;
            font-style: italic;
            margin: 10px 0;
        }

        .certificate__signature{
            font-size: 50px;
            font-family: 'Courgette';
            width: fit-content;
            margin: 0 auto 10px;
            padding: 0 30px 10px 30px;
            font-style: italic;
            border-bottom: 2px solid #000;
        }

    </style>
</head>
<body>
<div class="certificate">
    <div class="certificate__container">
        <div class="certificate__content">
            <h1 class="certificate__title">СЕРТИФИКАТ</h1>
            <h2 class="certificate__second-title">ОБ ОКОНЧАНИИ СТАЖИРОВКИ Name Surname </h2>
            <div class="certificate__text">Настоящим удостоверяется, что</div>
            <div class="certificate__info">Course</div>
            <div class="certificate__text">Завершил 7-дневную стажировку по
                профессии "Экономист" в компании Jaryq
            </div>
        </div>

        <div class="certificate__bottom">
            <div class="certificate__signature">Jaryq</div>
            <div class="certificate__image">
{{--                <img src="images/logo.png" alt="">--}}
                <img src="{{url('images/logo.png')}}" alt="">
            </div>
        </div>

    </div>
</div>
</body>
</html>
