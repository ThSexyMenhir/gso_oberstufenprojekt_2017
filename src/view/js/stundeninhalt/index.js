$('#delete').click(function (e) {
    return confirm("Wollen Sie wirklich den Stundeninhalt löschen");
});

//Oliver Script ^^
document.addEventListener("DOMContentLoaded", function() {
	var scrollWeeks = {
		scrollPostion: Number(),
		buttons: document.querySelectorAll(".js-scroll"),
		data: Array(),
		init: function(data){
			this.data = this.sortByDate(data);
			this.addListener();
			this.scrollPostion = this.dateDetector(this.data);
			console.log(this.data[this.scrollPostion]);
		},
		sortByDate: function(data){
			data.sort(function(a,b){
  				return new Date(a.startDate) - new Date(b.startDate);
			});
			return data;
		},
		addListener:function(){
			Array.prototype.forEach.call(this.buttons, function(button) {
				button.addEventListener("click",function(){
					alert(this.getAttribute("id"));
					scrollWeeks.build()
				});
			});
		},
		dateDetector: function(data){
			var postion = null;
			var today = new Date();
			today.setHours(0,0,0,0);
			data.forEach(function(e, i, a){
				if(today >= new Date(e.startDate) && today <= new Date(e.endDate)){
					postion = i;
				}
			});
			if(postion != null){
				return postion
			}else {
				console.warn("Today not found");
				return 0;
			}
		},
		buildWeek: function(){

		},
		buildDay: function(){

		}
	}
	if(document.querySelector("#weekDate")){
		scrollWeeks.init(JSON.parse(document.querySelector("#weekDate").getAttribute("data-weeks")));
	}
});
