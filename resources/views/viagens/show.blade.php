<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freire's - Controle de Viagens</title>
    <link rel="shortcut icon" type="image/ico" href="{{ asset('images/favicon.ico') }}"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .details {
            max-width: 600px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .details p {
            margin: 10px 0;
        }
        .details p span {
            font-weight: bold;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            color: #0056b3;
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

        .main-content {
            margin-top: 8%; /* Altura do header */
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-logo">
            <a href="/" style="background-color:rgb(0, 0, 0);"><img src="{{ asset('images/text_logo.png') }}" alt="Text logo"></a>
        </div>
        <ul class="navbar">
            <li><a href="/veiculos" style="background-color:rgb(0, 0, 0);">VEÍCULOS</a></li>
            <li><a href="/motoristas" style="background-color:rgb(0, 0, 0);">MOTORISTAS</a></li>
            <li><a href="/viagens" style="background-color:rgb(0, 0, 0);">VIAGENS</a></li>
        </ul>
    </header>
    <div class="main-content">
        <h1>Detalhes da Viagem</h1>

        <div class="details">
            <p><span>Veículo:</span> {{ $viagem->veiculo->modelo }} ({{ $viagem->veiculo->ano }})</p>
            <p><span>Motorista:</span> {{ $viagem->motorista->nome }}</p>
            <p><span>KM Inicial:</span> {{ $viagem->km_inicial }}</p>
            <p><span>KM Final:</span> {{ $viagem->km_final }}</p>
            <p><span>Data de Criação:</span> {{ $viagem->created_at->format('d/m/Y H:i') }}</p>
            <p><span>Última Atualização:</span> {{ $viagem->updated_at->format('d/m/Y H:i') }}</p>
        </div>

        <a href="{{ route('viagens.index') }}" class="back-link">Voltar para a Lista de Viagens</a>
    </div>
</body>
</html>
