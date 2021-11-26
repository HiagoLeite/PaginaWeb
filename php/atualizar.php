<?php
    //IMPORT DO ARQUIVO 
    require_once('db.class.php');
    
    // SUPER GLOBAL, RECUPERA DADOS ENVIADOS ATRAVÉS DE UM FORM
    $nomeAntigo=$_POST['nomeTroca'];
    $nomeNovo=$_POST['nomeNovo'];
    $depAntigo=$_POST['departamentoTroca'];
    $depNovo=$_POST['departamentoNovo'];
    $cargAntigo=$_POST['cargoTroca'];
    $cargNovo=$_POST['cargoNovo'];
    
    $objDb = new db();
    // COMO A FUNÇÃO RETORNA A CONEXÃO, É ATRIBUIDO A $LINK
    $link = $objDb->conecta_mysql();

    //QUERY INSERT
    $sql="SELECT idUsuario FROM usuario WHERE exists(SELECT*FROM cargo,centrodecusto,departamento 
        WHERE centrodecusto.idCentro=departamento.idCentro AND departamento.idDepartamento=cargo.idDepartamento AND cargo.idcargo=usuario.idCargo AND 
            departamento.nomeDep='$depAntigo'AND cargo.nomeCarg='$cargAntigo' AND usuario.nomeUsu='$nomeAntigo')";

        if($idRes=mysqli_query($link,$sql)){
            $row = mysqli_fetch_row($idRes);
            $id=$row[0];

                if(!empty($nomeNovo)){
                    $sql1="UPDATE usuario SET nomeUsu='$nomeNovo' WHERE idUsuario= '$id'"; 
                    mysqli_query($link,$sql1);
                }
                if(!empty($cargNovo)){
                    $sql3="UPDATE cargo SET nomeCarg='$cargNovo' WHERE idCargo= '$id'";
                    mysqli_query($link,$sql3);
                }
                if(!empty($depNovo)){
                    $sql2="UPDATE departamento SET nomeDep='$depNovo' WHERE idDepartamento= '$id'";
                    mysqli_query($link,$sql2);
                }
            header('Location: ../index.php');
        }else{
            echo "ERRO!";
        }
?>