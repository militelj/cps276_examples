"use strict";

var wt = {}

wt.init = function(){
	if(document.getElementById('addName')){
		document.getElementById('addName').addEventListener("click", wt.addName);
	}
}

wt.addName = function(){
	var i, inputs, data={}, xhttp, response;
	inputs = document.querySelectorAll('input[type="text"]');
	i = 0;
	data.flag = 'addName';
	while(i < inputs.length){
		name = inputs[i].name;
		if(name == 'state'){
			data[name] = inputs[i].value.toUpperCase();
		}
		else{
			data[name] = inputs[i].value.charAt(0).toUpperCase() + inputs[i].value.slice(1);
		}
		
		i++;
	}

	data = JSON.stringify(data);
	
	/* RESET i*/
	i = 0;
	xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			response = JSON.parse(this.responseText);
			
			if(response.masterstatus === 'error'){
				document.getElementById('msg').innerHTML = response.msg;
			}
			else {
				document.getElementById('msg').innerHTML = response.msg;
				document.getElementById('namelist').innerHTML = response.list;
			}
		}
	};
	xhttp.open("POST", "../xhr/switch.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("data=" + data);
	//data = JSON.stringify(data);
	//crud.sendRequest(data);





}


wt.init();