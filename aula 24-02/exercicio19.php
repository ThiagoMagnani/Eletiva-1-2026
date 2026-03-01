<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1></h1>
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label">Insira o valor em dias</label>
                <input type="text" id="num1" name="num1" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $valor1 = $_POST['num1'];
            $horas = floor($valor1 * 24);
            $minutos = floor($valor1 * 24 * 60);
            $segundos = floor($valor1 * 24 * 60 * 60);
            echo "O valor em horas é: $horas<br>";
            echo "O valor em minutos é: $minutos<br>";
            echo "O valor em segundos é: $segundos<br>";
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>