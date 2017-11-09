document.addEventListener("DOMContentLoaded", function() {
	if(document.querySelector("#searchclear")){
		document.querySelector("#searchclear").addEventListener("click",function(){
	    	document.querySelector("#searchinput").value = "";
		});
	}
});
