<?php
    // conexão com banco 
    include_once("conecta.php");

    // receber os dados enviados pelo formulárop

    $recproduto=$_POST["fproduto"];
    $recvalor=$_POST["fvalor"];
    $rectamanho=$_POST["ftamanho"];
    $recdescri=$_POST["fdescri"];
    if(isset($_POST["flanc"])){$reclanc=$_POST["flanc"];}else{$reclanc="";};
    if(isset($_POST["fpromo"])){$recpromo=$_POST["fpromo"];}else{$recpromo="";};
    $recfoto=$_FILES["ffoto"]["name"];
    

    //renomeando o arquivo(foto)

    $ext=strtolower(pathinfo($recfoto, PATHINFO_EXTENSION));
    $data=date("d/m/Y"); // pega a data e hora atual, em dia mes ano 
    $hora=time(); //pega a hora atual, no formato  hh/mm/ss
    $novonome=md5($recfoto.$data.$hora).".".$ext;
    

    // envio do arquivo para uma pasta especifica do servidor (upload do arquivo )
    move_uploaded_file($_FILES["ffoto"]["tmp_name"],"..\imagens\produtos/$novonome");
   
    // ajuste de moeda para o banco de dados Tirar R$ e , virgula 

    $recvalor= str_replace("R$","",$recvalor);
    $recvalor= str_replace(".","",$recvalor);
    $recvalor= str_replace(",",".",$recvalor);

    // gravando os dados no banco
    mysqli_query($conexao, "INSERT INTO produtos (produto,valor,tamanho,descri,lanc, 
    promo,foto)VALUES ('$recproduto','$recvalor','$rectamanho','$recdescri','$reclanc','$recpromo','$novonome')");

    header("location:admin.php");
?>