module.exports = {
	el: document.getElementById('aircraftselector'),
	ajaxCall: function() {
		var e = this.el;
		var term = e.options[e.selectedIndex].value.toLowerCase();
		var ajaxUrl = 'http://gulfare.dev/wp-admin/admin-ajax.php';
		$.ajax({
			method: 'GET',
			url: ajaxUrl,
			data: {'action': 'create_card', 'term': term}
		})
		.done(function( data ) {
			    var i,j,temparray,chunk = 3;
				var arr = [];
				for (i=0,j=data.length; i<j; i+=chunk) {
				    temparray = data.slice(i,i+chunk);
				    arr[i] = temparray;
				}
			console.log(arr);
		});
	},
	handleEvent: function() {
		this.ajaxCall();
	}
}