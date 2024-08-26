<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">

        <form method="post">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">PESO</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="peso" name="peso">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">ALTURA</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="altura" name="altura">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Calcular</button>
            </div>

            <br><br><br>
        </form>

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        require "../Controller/ControllerImc.php";

        $controller = new ControllerImc();

        if (isset($_POST["peso"]) && isset($_POST["altura"])) {
            $peso = $_POST["peso"];
            $altura = $_POST["altura"];

            $resultado = $controller->CalculoIMC($peso, $altura);


            echo "IMC: " . $resultado["imc"] . "<br>";
            echo "Faixa: " . $resultado["faixa"] . "<br>";


            $resultado = $controller->enviarDados($peso, $altura);

            header("Location: {$_SERVER['PHP_SELF']}");
            exit;

        }

        $dados = $controller->pegarDados();

        foreach ($dados as $dado) {
            echo "Peso: " . $dado['peso'] . "<br>";
            echo "Altura: " . $dado['altura'] . "<br>";
        }



        ?>

    </div>
</body>

</html>