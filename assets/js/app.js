let abrir = document.getElementById("openPopup");
let adicionar_dados = document.getElementById("adicionar-dados");
let cancelar = document.getElementById("cancelar");
let salvar_notas = document.getElementById("salvarNotas");
let salvar_edição = document.getElementById("salvarEditar");

abrir.addEventListener('click', ExibirPopupDados);
adicionar_dados.addEventListener('click', ExibirPopupNotas);
cancelar.addEventListener('click', FecharPopup);
salvar_notas.addEventListener('click', salvarNotas)
salvar_edição.addEventListener('click', salvarEdição)

function ExibirPopupDados(){
    let dados = document.getElementById("popup");
    dados.showModal();
}
function ExibirPopupNotas(){
      //Incrementar esta função com as verificações dos dados e transformar os inputs em json
    //para o uso no PHP.
    let notas = document.getElementById("popupNotas");
    notas.showModal();
}

function salvarNotas(){
    //Criar uma função para incrementar ou concatenar o json da função anterior
}

function salvarEdição(){
    // Criar uma função que gere um json para integração com php
}

//Considerações, os botões de controle vão possuir funções parecidas, 
//ambos os dois com a geração de Json's para integração com PhP
// também, conforme necessário terão funções de "Show ou Close Modal"

function FecharPopup(){
    let dados= document.getElementById("popup");
    let notas = document.getElementById("popupNotas")
    dados.closeModal();
    notas.closeModal();
}

function alternarBimestre() {
    const switchCheckbox = document.getElementById("switchBimestre");
    const primeiroBimestreLabel = document.getElementById("primeiroBimestre");
    const segundoBimestreLabel = document.getElementById("segundoBimestre");

    if (switchCheckbox.checked) {
        primeiroBimestreLabel.classList.remove("selecionado");
        segundoBimestreLabel.classList.add("selecionado");
        document.getElementById("input_prova_2").disabled = false;
        document.getElementById("input_aep_2").disabled = false;
        document.getElementById("input_prova_integrada_2").disabled = false;
        document.getElementById("input_prova_1").disabled = true;
        document.getElementById("input_aep_1").disabled = true;
        document.getElementById("input_prova_integrada_1").disabled = true;
        document.getElementById("input_prova_1").value = "";
        document.getElementById("input_aep_1").value = "";
        document.getElementById("input_prova_integrada_1").value = "";
    } else {
        primeiroBimestreLabel.classList.add("selecionado");
        segundoBimestreLabel.classList.remove("selecionado");
        document.getElementById("input_prova_1").disabled = false;
        document.getElementById("input_aep_1").disabled = false;
        document.getElementById("input_prova_integrada_1").disabled = false;
        document.getElementById("input_prova_2").disabled = true;
        document.getElementById("input_aep_2").disabled = true;
        document.getElementById("input_prova_integrada_2").disabled = true;
        document.getElementById("input_prova_2").value = "";
        document.getElementById("input_aep_2").value = "";
        document.getElementById("input_prova_integrada_2").value = "";
    }
}
