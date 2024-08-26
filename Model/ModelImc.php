<?php

    require_once "../Config/config.php"; 
    class ModelImc{

        public function processarDados($peso, $altura){
            global $con; 

            $sql = "INSERT INTO imc (peso, altura) VALUES ('$peso', '$altura')"; 


            if ($con->query($sql) === TRUE) {
                $data = array('status' => 'Inserido com sucesso');
            } else {
                $data = array('status' => 'erro', 'mensagem' => $con->error);
            }
            
            return $data;
        }


        public function selecionarDados(){
            global $con; 
        
            $dados = [];
        
            $query = "SELECT * FROM imc";
            $resultado = mysqli_query($con,$query);
            
            if(mysqli_num_rows($resultado) > 0){
        
                while($row = mysqli_fetch_array($resultado)){
    
                    $dados[] = array(
                        'peso' => $row["peso"],
                        'altura' => $row["altura"]
                    );
                }
            }
        
            mysqli_close($con);
            
            return $dados;
        }
    }
    

?>
