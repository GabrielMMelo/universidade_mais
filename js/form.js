function enviar() {
    var nome = document.getElementById("inputNome"), email = document.getElementById("inputEmail");

    if (nome.value !== "") {
    	if(email.value !== "") {
        	alert('Obrigado sr(a) ' + nome.value + ' os seus dados foram encaminhados com sucesso!');
    	}
    	else {
    		alert('ERRO! O campo obrigatório abaixo não foi preenchido: \n \"E-mail\"');
    	}
    }
    else if(email.value == "") {
        	alert('ERRO! Os campos obrigatórios abaixo não foram preenchidos: \n \"Nome\" & \"E-mail\"');
    }

    else {
    	alert('ERRO! O campo obrigatório abaixo não foi preenchido: \n \"Nome\" ');
    }
}