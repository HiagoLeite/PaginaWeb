<?php
    //IMPORT DO ARQUIVO 
    require_once('db.class.php');
    
    // SUPER GLOBAL, RECUPERA DADOS ENVIADOS ATRAVÉS DE UM FORM
    $nomeAntigo=$_POST['nomeTroca'];
    $nomeNovo=$_POST['nomeNovo'];
    $depAntigo=$_POST['departamentoTroca'];
    $depNovo=$_POST['departamentoNovo'];
    $cetAntigo=$_POST['centroCustoTroca'];
    $cetNovo=$_POST['centroCustoNovo'];
    
    $objDb = new db();
    // COMO A FUNÇÃO RETORNA A CONEXÃO, É ATRIBUIDO A $LINK
    $link = $objDb->conecta_mysql();

    //QUERY INSERT
    //$sql="SELECT idUsuario,nomeUsu from usuario WHERE usuario.nomeUsu='$nomeAntigo'";

    $sql="SELECT idUsuario FROM usuario WHERE exists(SELECT*FROM cargo,centrodecusto,departamento 
        WHERE centrodecusto.idCentro=departamento.idCentro AND departamento.idDepartamento=cargo.idDepartamento AND cargo.idcargo=usuario.idCargo AND 
            departamento.nomeDep='$depAntigo' AND usuario.nomeUsu='$nomeAntigo')";


        if($idRes=mysqli_query($link,$sql)){
            $row = mysqli_fetch_row($idRes);
            $id=$row[0];
            //var_dump($id);

            $sql1="UPDATE usuario SET nomeUsu='$nomeNovo' WHERE idUsuario= '$id'"; 
            $sql2="UPDATE departamento SET nomeDep='$depNovo' WHERE idDepartamento= '$id'";
            $sql3="UPDATE centrodecusto SET valor='$cetNovo' WHERE idCentro= '$id'";
            mysqli_query($link,$sql1);
            mysqli_query($link,$sql2);
            mysqli_query($link,$sql3);
            echo"Registro Atualizado";
        }else{
            echo "ERRO!";
        }
?>