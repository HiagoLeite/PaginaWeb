<?php
    //IMPORT DO ARQUIVO 
    require_once('db.class.php');
    
    // SUPER GLOBAL, RECUPERA DADOS ENVIADOS ATRAVÉS DE UM FORM
    $nomeDel=$_POST['nomeDel'];
    $depDel=$_POST['departamentoDel'];
    $cetDel=$_POST['centroCustoDel'];
    
    $objDb = new db();
    // COMO A FUNÇÃO RETORNA A CONEXÃO, É ATRIBUIDO A $LINK
    $link = $objDb->conecta_mysql();

    //QUERY INSERT
    $sql="SELECT idUsuario FROM usuario WHERE exists(SELECT*FROM cargo,centrodecusto,departamento 
        WHERE centrodecusto.idCentro=departamento.idCentro AND departamento.idDepartamento=cargo.idDepartamento AND cargo.idcargo=usuario.idCargo AND 
            departamento.nomeDep='$depDel'AND centrodecusto.valor='$cetDel' AND usuario.nomeUsu='$nomeDel')";

        if($idRes=mysqli_query($link,$sql)){

            $row = mysqli_fetch_row($idRes);
            $id=$row[0];

            $sql1="DELETE FROM centrodecusto WHERE centrodecusto.idCentro='$id'"; 
            $sql2="DELETE FROM departamento WHERE departamento.idDepartamento='$id'";
            $sql3="DELETE FROM cargo WHERE cargo.idcargo='$id'";
            $sql4="DELETE FROM usuario WHERE usuario.idUsuario='$id'";
            
            if(mysqli_query($link,$sql1) && mysqli_query($link,$sql2) && mysqli_query($link,$sql3) && mysqli_query($link,$sql4)){
                header('Location: ../index.php');
            }else{
                echo "ERRO NA QUERY";
            }            
        }else{
            echo "ERRO!";
        }
?>