let abrir = document.getElementById("openPopup");
let abrirEditar = document.getElementById("openPopupTeste");
let adicionar_dados = document.getElementById("adicionar-dados");
let cancelar = document.getElementById("cancelarPopup");
let salvar_notas = document.getElementById("salvarNotas");
let salvar_edição = document.getElementById("salvarEditar");
let update = document.getElementById("updatepopup");

abrir.addEventListener('click', ExibirPopupDados);
abrirEditar.addEventListener('click', ExibirPopupEditarNotas);
adicionar_dados.addEventListener('click', ValidarDados());
cancelar.addEventListener('click', FecharPopup);
salvar_notas.addEventListener('click', salvarNotas)
salvar_edição.addEventListener('click', salvarEdição)
update.addEventListener("click", function() {
    ExibirPopupEditarNotas();
});

function ExibirPopupDados(){
    let dados = document.getElementById("dialogPopup");
    dados.showModal();
}
function ExibirPopupNotas(){
      //Incrementar esta função com as verificações dos dados e transformar os inputs em json
    //para o uso no PHP.
    let notas = document.getElementById("dialogPopupNotas");
    notas.showModal();
}

function ExibirPopupEditarNotas() {
    //Incrementar esta função com as verificações dos dados e transformar os inputs em json
    //para o uso no PHP.
    let editar = document.getElementById("dialogPopupEditarNotas");
    editar.showModal();
}

function ValidarDados() {
    let nome = document.getElementById("input_nome").value;
    let ra = document.getElementById("input_ra").value;
    let email = document.getElementById("input_email").value;
    const nomeRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/; // Permite letras (com ou sem acento) e espaços
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!nome || !ra || !email) {
        alert("Todos os campos são obrigatórios!");
        return false; // Impede o envio do formulário
    }

    if (!nomeRegex.test(nome)) {
        alert("O nome inserido não é válido! Por favor, insira apenas letras.");
        return false; // Impede o envio do formulário
    }

    if (!emailRegex.test(email)) {
        alert("O e-mail inserido não está em um formato válido!");
        return false; // Impede o envio do formulário
    }

    // Se todos os campos são válidos, retorna true
    return true;
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
    let dados = document.getElementById("dialogPopup");
    // let notas = document.getElementById("dialogPopupNotas");
    let editar = document.getElementById("dialogPopupEditarNotas");
    dados.close();
    // notas.close();
    editar.close();
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



function callPHPFunction($ra) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "AlunoModel.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('resultado').innerHTML = this.responseText;
        }
    };
    xhttp.send($ra);
}
