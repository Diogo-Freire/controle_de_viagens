<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freire's - Controle de Viagens</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('images/favicon.ico') }}"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        header {
            width: 100%;
            height: 15%;
            background-color: #000;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-logo img {
            max-width: 200px;
            height: auto;
        }

        .navbar {
            display: flex;
            justify-content: center;
            list-style: none;
            margin: 0;
        }

        .navbar li {
            margin: 0 15px;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }

        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 500px;
        }

    </style>
</head>
<body>    
    <header>
        <div class="header-logo">
            <img src="{{ asset('images/text_logo.png') }}" alt="Text logo">
        </div>
        <ul class="navbar">
            <li><a href="/veiculos">VEÍCULOS</a></li>
            <li><a href="/motoristas">MOTORISTAS</a></li>
            <li><a href="/viagens">VIAGENS</a></li>
        </ul>
    </header>

    <div class="logo">
            <img src="{{ asset('images/car_logo.png') }}" alt="Car Logo">
    </div>

</body>
</html>
