<?php
   
   function conectar(){
    $host = "localhost";
    $db = "bd_bdm_project";
    $user = "root";
    $pass = "";
    $conexion = mysqli_connect( $host, $user, $pass, $db);
    mysqli_set_charset($conexion, "utf8");
    mysqli_select_db($conexion, $db);

    return $conexion;
   }

   
   
   /*class db {
        static public function connect() {
            $host = "localhost";
            $db = " bd_bdm_project";
            $user = "root";
            $pass = "";
            try {
                $mysqli = new mysqli($host,$user,$pass,$db);
                if ($mysqli->connect_errno) {
                    $response = (object)array("status"=>500,"message"=>$mysqli->connect_error);
                    echo json_encode($response);
                    die("Error de conexión: " . $mysqli->connect_error);
                }

            } catch(Exception $e) {
                $response = (object)array("status"=>500,"message"=>"Error a conectarse a la base de datos, favor de crear la base de datos en el archivo database.sql o configurar el usuario y contraseña en el archivo db.php");
                echo json_encode($response);
                exit;
            }
            return $mysqli;
        }
      
    }*/
?>