<?php
  //Importando el script de conexion //Import connection's script
  require('connect.php');

  //Verificando la conexion  //Verify connection
  if(!isset($connect)){
    echo "<h2> Fallo la conexion! Error: ". mysqli_error($connect) . "</h2>";
  } else{//Si la conexion es exitosa, se suben los datos //If connect is right, upload data
    $table= 'form_data'; //nombre de tabla en la base de datos //Table's name

    //Datos desde formulario, metodo _POST //Form data, POST method
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mail = $_POST['mail'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];

    //Preparando insersion //Prepare insert
    $insert= 'INSERT INTO '.$table.'(id, name, surname, mail, country, phone, job) VALUES (NULL, "'.$name.'", "'.$surname.'", "'.$mail.'", "'.$country.'", "'.$phone.'", "'.$job.'")';

    //Insertando datos //Inserting data
    $result= mysqli_query($connect, $insert);

    //Comprobando insersion //Comprobe insert
    if($result){//Si resulta > redirije al index //If results > redirects to index
      header('Location: ../index.html');
    } else{//Si no resulta > imprime error //If not result, print error
      echo "<h2>Error: " . $insert . "</h2><br><h3>" . mysqli_error($connect)."</h3>";
    }

    //Cerrando la conexion para no exprimir recursos //Closing connection
    mysql_close($connect);
  }
?>
