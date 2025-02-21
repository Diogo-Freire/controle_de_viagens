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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            display: inline-block;
            margin: 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: black;
            border-radius: 5px;
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #a71d2a;
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
        <h1>Lista de Motoristas</h1>
        <a href="{{ route('motoristas.create') }}">Cadastrar Motorista</a>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>cnh</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motoristas as $motorista)
                    <tr>
                        <td>{{ $motorista->nome }}</td>
                        <td>{{ $motorista->cnh }}</td>
                        <td>
                            <a href="{{ route('motoristas.show', $motorista->id) }}">Ver</a>
                            <a href="{{ route('motoristas.edit', $motorista->id) }}">Editar</a>
                            <form action="{{ route('motoristas.destroy', $motorista->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta viagem?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
