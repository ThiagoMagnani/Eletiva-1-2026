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
                <label for="palavra" class="form-label">Insira a primeira palavra: </label>
                <input type="text" name="palavra" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="palavra2" class="form-label">Insira a segunda palavra: </label>
                <input type="text" name="palavra2" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $palavra = $_POST["palavra"];
            $palavra2 = $_POST["palavra2"];

            if (strpos($palavra, $palavra2) !== false) {
                echo $palavra2;
            } elseif (strpos($palavra2, $palavra) !== false) {
                echo $palavra;
            } else {
                echo "Não encontrado!";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>