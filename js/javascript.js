
function isEmpty(obj){
	// Seleciona um ul para verificar se ja existe, caso contrario seria duplicada
	var ul = obj.parentElement.querySelector('ul');
	// Remove espaços em branco
	var value = obj.value.trim();

	// Verifica se o campo esta vazio
	if(value == ""){
		// Aqui acontece se o campo estiver vazio
		// Altera a cor do campo para um ton de vermelho claro
		obj.style.backgroundColor = "#ffefef";

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
	}
}

// Limpa a mensagem de erro, se contem digitos, quando se começa a digitar
function clearError(obj){
	// Seleciona um ul 
	var ul = obj.parentElement.querySelector('ul');
	
	var value = obj.value.trim();
	console.log(ul);	
	// Remove a mensagem de erro se o campo não estiver em branco
	if(value != ""){
		// Verifica se ja existe para ser removido
		if(ul){
			// Remove a ul com a mensagem de erro
			obj.parentElement.removeChild(obj.parentElement.lastChild);
			// Muda a cor do campo pra branco
			obj.style.backgroundColor = "#fff";			
		}
	}else{
		// Exibe alerta de erro caso a tecla em branco sejam precionada de inicio
		isEmpty(obj);
	}		
}

// Verifica se os campos estão vazios para mandar um mensagem de erro
function checkEmpty(){
	var name = document.querySelector("#name").value.trim();
	var company = document.querySelector("#company").value.trim();
	var language = document.querySelector("#language").value.trim();
	var email = document.querySelector("#email").value.trim();

	if(name == "" || company == "" || language == "" || email == ""){
		alert("Todos os campos precisam ser preenchidos");
		event.preventDefault();
	}	
}
