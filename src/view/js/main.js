document.addEventListener("DOMContentLoaded", function() {
	if(document.querySelector("#searchclear")){
		document.querySelector("#searchclear").addEventListener("click",function(){
	    	document.querySelector("#searchinput").value = "";
			jsSearch.search();
		});
		var jsSearch = {
			danger: document.querySelector(".alert").parentElement,
			input: document.querySelector("#searchinput"),
			button: document.querySelector("#searchButton"),
			panels: document.querySelector(".panel-group").querySelectorAll(".panel"),
			init: function(){
				this.button.addEventListener("click",function(){
					jsSearch.search();
				});
				this.input.addEventListener("keyup",function(event){
					event.preventDefault();
					if(event.keyCode === 13){
						jsSearch.search();
					}
				})
			},
			search: function(){
				var elementCounter = jsSearch.panels.length;
				Array.prototype.forEach.call(jsSearch.panels, function(panel) {
					var headline = panel.querySelector(".panel-body") ? panel.querySelector(".panel-body").innerText.toLowerCase() : "";
					var content = panel.querySelector(".panel-footer .text") ? panel.querySelector(".panel-footer .text").innerText.toLowerCase() : "";
					if(headline.search(jsSearch.input.value.toLowerCase()) != -1 || content.search(jsSearch.input.value.toLowerCase()) != -1){
						panel.parentElement.style.removeProperty('display');
					}else{
						panel.parentElement.style.display = "none";
						elementCounter--;
					}
				});
				if(elementCounter){
					jsSearch.danger.classList.add("display-none");
				}else{
					jsSearch.danger.classList.remove("display-none");
				}
			}
		}
		jsSearch.init();
	}
});
