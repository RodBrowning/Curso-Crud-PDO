
function isEmpty(obj){
	// Seleciona um ul para verificar se ja existe, caso contrario seria duplicada
	var ul = obj.parentElement.querySelector('ul');
	// Verifica se o campo esta vazio
	if(obj.value == ""){
		// Aqui acontece se o campo estiver vazio
		// Altera a cor do campo para um ton de vermelho claro
		obj.style.backgroundColor = "#ffc6c6";

		// Se nao existir uma ul ela será criada
		// Se exister sera excluido o li dentro dela
		if(!ul){				
			var ul = document.createElement("ul");
		}else{
			ul.removeChild(ul.lastChild);
		}

		// Exibe a mensagem de erro
		var li = document.createElement("li");
		var txt = document.createTextNode("Este campo é obrigatorio");
		ul.appendChild(li);
		li.appendChild(txt);
		obj.parentElement.appendChild(ul);	
	}else{
		if(ul){
			obj.parentElement.removeChild(obj.parentElement.lastChild);
		}
		obj.style.backgroundColor = "#fff";
		var li = document.querySelector('#li');				
	}
}

// Verifica se os campos estão vazios para mandar um mensagem de erro
function checkEmpty(){
	var name = document.querySelector("#name");
	var company = document.querySelector("#company");
	var language = document.querySelector("#language");
	var email = document.querySelector("#email");

	if(name.value == "" || company.value == "" || language.value == "" || email.value == ""){
		alert("Todos os campos precisam ser preenchidos");
		event.preventDefault();
	}	
}
