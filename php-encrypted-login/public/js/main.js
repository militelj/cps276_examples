"use strict";

var admin = {}

/**CHECK FOR BUTTON TO EXISTS IF SO ADD EVENT LISTENER */
admin.init = function(){
	if(document.getElementById('loginBtn')){
		document.getElementById('loginBtn').addEventListener('click', admin.login, false);
	}
	if(document.getElementById('addAdminBtn')){
		document.getElementById('addAdminBtn').addEventListener('click', admin.addAdmin, false);
	}
}

/**GET THE VALUES OF THE INPUT BOXES PUT THEM INTO AN OBJECT AND PASS THEM TO THE XHR SWITCH FILE */
admin.login = function(){
	var data = {}
	data.flag = "login";
	data.username = document.getElementById('username').value;
	data.password = document.getElementById('password').value;

	data = JSON.stringify(data);
	admin.sendRequest(data);
}

admin.addAdmin = function(){
	var data = {}
	data.flag = "addAdmin";
	data.username = document.getElementById('username').value;
	data.password = document.getElementById('password').value;

	data = JSON.stringify(data);
	admin.sendRequest(data);
}

/** AJAX REQUEST TO THE SWITCH FILE. */
admin.sendRequest = function(data){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var msg = '';
			console.log(this.responseText)
			/**I USED THIS SWITCH SO I COULD HANDLE MULTIPLE RESPONSES FROM THE SERVER */
			switch (this.responseText) {
				case 'error': msg = "There was an error processing your request"; break;
				case 'not found': msg = "There are no records found with that username and/or password"; break;
				case 'failed': msg = "Username and password are not correct"; break;
				case 'success': window.location.href = "home.php"; break;
				case 'duplicate': msg = "That username and or password is taken"; break;
				case 'added': msg = "Admin has been added"; admin.clearValues(); break;
				default: msg = 'Something else went wrong'; break;
			}

			document.getElementById('message').innerHTML = msg;
		}
	};
	xhttp.open("POST", "../xhr/switch.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("data=" + data);
}

admin.clearValues = function(){
	document.getElementById('username').value = '';
	document.getElementById('password').value = '';
}
admin.init();
