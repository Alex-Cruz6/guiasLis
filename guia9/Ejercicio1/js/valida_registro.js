with(document.registro){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && username.value==""){
			ok=false;
			alert("Debe escribir un nombre de usuario");
			username.focus();
		}
		if(ok &&name.value==""){
			ok=false;
			alert("Debe escribir su nombre");
			fullname.focus();
		}
		if(ok && apellido.value==""){
			ok=false;
			alert("Debe escribir su Apellido");
			email.focus();
		}
		if(ok && password.value==""){
			ok=false;
			alert("Debe escribir su password");
			password.focus();
		}
		if(ok && confirm_password.value==""){
			ok=false;
			alert("Debe escribir su confirmacion de password");
			confirm_password.focus();
		}

		if(ok && password.value!= confirm_password.value){
			ok=false;
			alert("Los passwords no coinciden");
			confirm_password.focus();
		}


		if(ok){ submit(); }
	}
}
