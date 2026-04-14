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
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome[]" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" name="telefone[]" class="form-control" required>
                    </div>
                    <hr>';
            }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $nomes = $_POST['nome'];
            $telefones = $_POST['telefone'];
            $contatos = array();

            for ($i = 0; $i < count($nomes); $i++) {

                $nome = $nomes[$i];
                $telefone = $telefones[$i];

                // Verificar duplicidade de nome
                if (array_key_exists($nome, $contatos)) {
                    echo "<p class='text-danger'>Nome duplicado: $nome</p>";
                    continue;
                }

                // Verificar duplicidade de telefone
                if (in_array($telefone, $contatos)) {
                    echo "<p class='text-danger'>Telefone duplicado: $telefone</p>";
                    continue;
                }

                // Adiciona ao mapa
                $contatos[$nome] = $telefone;
            }

            // Ordenar pelo nome (chave)
            ksort($contatos);

            echo "<h3>Lista de Contatos Ordenada:</h3>";

            foreach ($contatos as $nome => $telefone) {
                echo "<p><strong>$nome</strong>: $telefone</p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>