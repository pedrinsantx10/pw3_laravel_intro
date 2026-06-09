<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Livros</title>
</head>
<body>

    <h1>Cadastro de Livros</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/livros" method="POST">
        @csrf

        <div>
            <label>Título</label>
            <input type="text" name="titulo">
        </div>

        <div>
            <label>Autor</label>
            <input type="text" name="autor">
        </div>

        <div>
            <label>Ano de Publicação</label>
            <input type="number" name="ano_publicacao">
        </div>

        <button type="submit">Cadastrar</button>
    </form>

    <hr>

    <h2>Livros Cadastrados</h2>

    @if($livros->count())
        <ul>
            @foreach($livros as $livro)
                <li>
                    {{ $livro->titulo }}
                    - {{ $livro->autor }}
                    ({{ $livro->ano_publicacao }})
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum livro cadastrado.</p>
    @endif

</body>
</html>