document.addEventListener("DOMContentLoaded", function() {
	if(document.querySelector(".klassen")){
		document.querySelector("#searchclear").addEventListener("click",function(){
	    	document.querySelector("#searchinput").value = "";
	    });
	}
});
