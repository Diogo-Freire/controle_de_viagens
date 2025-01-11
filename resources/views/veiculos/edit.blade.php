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
        <h1>Editar Veículo</h1>
        <form action="{{ route('veiculos.update', $veiculo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $veiculo->modelo) }}" required>
                @error('model')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="number" name="ano" id="ano" value="{{ old('ano', $veiculo->ano) }}" required>
                @error('year')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="data_aquisicao">Data de Aquisição:</label>
                <input type="date" name="data_aquisicao" id="data_aquisicao" value="{{ old('data_aquisicao', $veiculo->data_aquisicao) }}" required>
                @error('data_aquisicao')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="km_aquisicao">KM Rodados no Momento da Aquisição:</label>
                <input type="number" name="km_aquisicao" id="km_aquisicao" value="{{ old('km_aquisicao', $veiculo->km_aquisicao) }}" required>
                @error('km_aquisicao')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="renavam">Renavam (Deve ser único):</label>
                <input type="text" name="renavam" id="renavam" value="{{ old('renavam', $veiculo->renavam) }}" required>
                @error('renavam')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Salvar Alterações</button>
        </form>

        <br>
        <a href="{{ route('veiculos.index') }}">Voltar para a Lista de Veículos</a>
    </div>
</body>
</html>
