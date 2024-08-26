<?php
    require "../Model/ModelImc.php";
    class ControllerImc
    {

        public function CalculoIMC($peso, $altura)
        {
            if (isset($peso) && isset($altura)) {
              
                $resultado = [];

                // Verifica se os valores de peso e altura são válidos (não são zero)
                if ($peso > 0 && $altura > 0) {

                    // Calcula o IMC
                    $imc = $peso / ($altura ** 2);

                    // Arredonda o resultado para duas casas decimais
                    $resultado["imc"] = round($imc, 2);

                    echo "Seu IMC é: " . $imc . "<br>";

                    // Utiliza uma estrutura de switch para determinar a categoria do IMC
                    switch (true) {
                        case ($imc < 18.5):
                            $resultado["faixa"] = "Abaixo do peso";
                            break;
                        case ($imc >= 18.5 && $imc < 25):
                            $resultado["faixa"] = "Peso normal";
                            break;
                        case ($imc >= 25 && $imc < 30):
                            $resultado["faixa"] = "Sobrepeso";
                            break;
                        default:
                            $resultado["faixa"] = "Obesidade";
                    }
                } else {
                    $resultado["faixa"] = "O peso e a altura devem ser valores positivos.";
                }
            } else {
                $resultado["faixa"] = "Por favor, insira seu peso e altura.";
            }

            return $resultado;
        }

        public function enviarDados($peso, $altura)
        {
            $model = new ModelImc();

            echo "". $peso ."". $altura ."<br>";

           return $model->processarDados($peso, $altura);
        }

        public function pegarDados(){
            $model = new ModelImc();

            return $model->selecionarDados();
        }
    }
?>