// JavaScript Document

// -------------- Banner Slick-----------
$(function(){
  $(".slides").slick({
	autoplay:true,
	pauseOnHover:true,
	dots:true
})
	
})
//---------------------------- Função para converter para reais
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function moeda(v){
    v=v.replace(/\D/g,"") // permite digitar apenas numero
    v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // 1.000.000.000,00
    v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // 1.000.000,00
    v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // 1.000,00
    v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // 1,00
    return "R$ " + v;
}
//-------------------------- Exclusão de produtos 

function verifica(recid, recfoto, recpag, reclimite){
    if(confirm('Tem certeza que deseja excluir este produto ?')){
        window.location="excprod.php?id="+ recid + "&foto=" + 
        recfoto + "&pag=" + recpag + "&limite=" + reclimite
    }
}
function verificabanner(recbanner){
        if(confirm("Tem certeza que deseja excluir este banner ?")){
            window.location="excbanner.php?banner="+ recbanner
        }
       
    }

function validauser(recid){
        if(confirm("Tem certeza que deseja excluir este Usuário ?")){
            window.location="excuser.php?id="+ recid
        }
       
    }



