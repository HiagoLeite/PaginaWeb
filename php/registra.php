<?php
    //IMPORT DO ARQUIVO 
    require_once('db.class.php');
    
    // SUPER GLOBAL, RECUPERA DADOS ENVIADOS ATRAVÉS DE UM FORM
    $id=0;
    $usuario = $_POST['nomeUsu'];
    $cargo = $_POST['nomeCar'];
    $departamento = $_POST['nomeDep'];
    $custo = $_POST['nomeCet'];
    
    $objDb = new db();
    // COMO A FUNÇÃO RETORNA A CONEXÃO, É ATRIBUIDO A $LINK
    $link = $objDb->conecta_mysql();

    //QUERY INSERT
    $sql="SELECT  max(usuario.idUsuario) from usuario;";
    //LOGICA PARA O ID 
        
        if($idRes=mysqli_query($link,$sql)){
            $row = mysqli_fetch_row($idRes);
            $id=$row[0];
            $id++;

            $sql1="INSERT INTO centroDeCusto VALUES('$id','$custo')";
            $sql2="INSERT INTO departamento VALUES('$id','$departamento','$id')";
            $sql3="INSERT INTO cargo VALUES('$id','$cargo','$id')";
            $sql4="INSERT INTO usuario VALUES('$id','$usuario','$id')";
            //EXECUTA QUERYS
            mysqli_query($link,$sql1);
            mysqli_query($link,$sql2);
            mysqli_query($link,$sql3);
            mysqli_query($link,$sql4);
            echo "Registrado";
        }else{
            echo "ERRO!";
        }
?>