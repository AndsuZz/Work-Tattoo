function checa_form(lista){		
			
				if(lista.nick.value ==""){
					alert("Campo Usuário está em branco");
					lista.nick.focus();
					return(false);
				}

				if(lista.rg.value ==""){
					alert("Campo RG está em branco");
					lista.rg.focus();
					return(false);
				}

					if(lista.email.value.indexOf('@',0)==-1){
					alert("Campo Email incorreto");
					lista.email.focus();
					return(false);
				}
					if (lista.wpp.value == "") {
					alert("Campo Telefone inválido");
					lista.wpp.focus();
					return(false);
				}

				if (lista.wpp.value.length < 8) {
					alert("Campo Telefone deve conter no mínimo 8 digitos");
					lista.wpp.focus();
					return(false);
				}

				if (lista.wpp.value.length > 10) {
					alert("Campo Telefone deve conter no máximo 14 digitos");
					lista.wpp.focus();
					return(false);
				}

				if(lista.nickpet.value ==""){
					alert("Campo Nome do Pet está em branco");
					lista.nickpet.focus();
					return(false);
				}

				if (lista.Idadepet.value == "") {
					alert("Campo idade pet inválido");
					lista.Idadepet.focus();
					return(false);
				}
				
				
				if (lista.endereço.value == "") {
					alert("Campo Endereço inválido");
					lista.endereço.focus();
					return(false);
				}


		

			};