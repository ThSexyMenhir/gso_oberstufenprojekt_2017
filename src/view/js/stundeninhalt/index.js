$('#delete').click(function (e) {
    return confirm("Wollen Sie wirklich den Stundeninhalt löschen");
});

//Oliver Script ^^
document.addEventListener("DOMContentLoaded", function() {
	var scrollWeeks = {
		data: Array(),
		init: function(data){
			this.data = this.sortByDate(data);
		},
		sortByDate: function(data){
			data.sort(function(a,b){
  				return new Date(a.startDate) - new Date(b.startDate);
			});
			return data;
		}
	}
	if(document.querySelector("#weekDate")){
		scrollWeeks.init(JSON.parse(document.querySelector("#weekDate").getAttribute("data-weeks")));
	}
});
