<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freire's - Controle de Viagens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        form {
            max-width: 500px;
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
        <h1>Editar Viagem</h1>

        <form action="{{ route('viagens.update', $viagem->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="veiculo_id">Veículo</label>
            <select name="veiculo_id" id="veiculo_id" required>
                <option value="" disabled>Selecione um veículo</option>
                @foreach ($veiculos as $veiculo)
                    <option value="{{ $veiculo->id }}" 
                        @if($veiculo->id == $viagem->veiculo_id) selected @endif>
                        {{ $veiculo->modelo }} ({{ $veiculo->ano }})
                    </option>
                @endforeach
            </select>

            <label for="motorista_id">Motorista</label>
            <select name="motorista_id" id="motorista_id" required>
                <option value="" disabled>Selecione um motorista</option>
                @foreach ($motoristas as $motorista)
                    <option value="{{ $motorista->id }}" 
                        @if($motorista->id == $viagem->motorista_id) selected @endif>
                        {{ $motorista->nome }}
                    </option>
                @endforeach
            </select>

            <label for="km_inicial">KM Inicial</label>
            <input type="number" name="km_inicial" id="km_inicial" value="{{ $viagem->km_inicial }}" required>

            <label for="km_final">KM Final</label>
            <input type="number" name="km_final" id="km_final" value="{{ $viagem->km_final }}" required>

            <button type="submit">Salvar Alterações</button>
        </form>

        <a href="{{ route('viagens.index') }}" class="back-link">Voltar para a Lista de Viagens</a>
    </div>
</body>
</html>
