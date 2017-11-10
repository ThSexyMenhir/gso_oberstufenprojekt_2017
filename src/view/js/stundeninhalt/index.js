$('#delete').click(function (e) {
    return confirm("Wollen Sie wirklich den Stundeninhalt löschen");
});
// YYYY-MM-DD
//Oliver Script ^^
document.addEventListener("DOMContentLoaded", function() {
	var scrollAjax = {
		buttons: document.querySelectorAll(".js-scroll"),
		init: function(){
			this.addListener();
		},
		call: function(data){
			$.ajax({
			  type: "POST",
			  url: "do-get-by-date-range.php",
			  data: {
				  startDate: data.monday,
				  endDate: data.friday
			  },
			  success: function(){
				  console.log("test");
			  }
		  	});
		},
		addListener:function(){
			Array.prototype.forEach.call(this.buttons, function(button) {
				button.addEventListener("click",function(){
					scrollAjax.call(scrollAjax.nextWeek());
				});
			});
		},
		nextWeek: function(){
			function formatDate(date) {
			    var d = new Date(date),
			        month = '' + (d.getMonth() + 1),
			        day = '' + d.getDate(),
			        year = d.getFullYear();

			    if (month.length < 2) month = '0' + month;
			    if (day.length < 2) day = '0' + day;
			    return [year, month, day].join('-');
			}
			var today = new Date();
			var diff = today.getDate() - today.getDay() + 1;
			if (today.getDay() == 0){
				diff -= 7;
			}else{
				diff += 7;
			}
			var monday = new Date(today.setDate(diff));
			var friday = new Date(monday);
			friday.setDate(friday.getDate() + (1 + 4 - friday.getDay()) % 7);
			return {
				"monday": formatDate(monday),
				"friday": formatDate(friday)
			};
		}
	}
	scrollAjax.init();
	/*var scrollWeeks = {
		scrollPostion: Number(),
		buttons: document.querySelectorAll(".js-scroll"),
		data: Array(),
		type: String(),
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
					scrollWeeks.build();
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
	}*/
});
