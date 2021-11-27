const checkPassword = (password1,password2) => {

	if (password2.value!==password1.value){
        alert("Passwords did not match")
		return false;
	}
    return true;

		
}