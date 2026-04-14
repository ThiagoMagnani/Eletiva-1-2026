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
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo '
                    <div class="mb-3">
                        <label class="form-label">Nome do aluno</label>
                        <input type="text" name="nome[]" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nota 1</label>
                        <input type="number" step="0.1" name="nota1[]" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nota 2</label>
                        <input type="number" step="0.1" name="nota2[]" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nota 3</label>
                        <input type="number" step="0.1" name="nota3[]" class="form-control" required>
                    </div>
                    <hr>';
            }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $nomes = $_POST['nome'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];

            $alunos = array();

            for ($i = 0; $i < count($nomes); $i++) {

                $nome = $nomes[$i];
                $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;

                // adiciona no mapa (nome => média)
                $alunos[$nome] = $media;
            }

            // ordenar pela média (valor) do maior para o menor
            arsort($alunos);

            echo "<h3>Lista de Alunos (por média):</h3>";

            foreach ($alunos as $nome => $media) {
                echo "<p><strong>$nome</strong>: Média = " . number_format($media, 2) . "</p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>