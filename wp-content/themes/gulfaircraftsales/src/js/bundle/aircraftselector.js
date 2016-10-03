module.exports = {
	el: document.getElementById('selector__select'),
	terms: [],
	posts: [],
	inventoryView: document.getElementById('inventory-view'),
	equaliser: function() {
	},
	handleData: function (data) {
		data.sort(function(a,b) {
			var termA = a.term[0].toUpperCase(),
				termB = b.term[0].toUpperCase()
				;
			if(termA > termB) {
				return 1;
			}
			if(termA < termB) {
				return -1;
			}
			return 0;
		});
		this.terms = [];
		var term,
			count = 0,
			rows = '<div class="inventory__type-wrapper">';	
		for(var i = 0; i < data.length; i ++) {
			term = data[i].term[0];
			var postTitle = data[i].post_title,
				registrationNumber = data[i].registration_number,
				featuredImage = data[i].featured_image,
				availability = data[i].availability,
				price = data[i].price,
				summary = data[i].summary,
				permalink = data[i].permalink
				availprice = (availability == 'Sold') ? 'Just Sold!' : price;
				;
			if ($.inArray(term, this.terms) == -1) {
				this.terms.push(term);
				count = 0;
				if (i != 0) { rows += '</div></div>'; }
				rows += '<div class="inventory__type inventory__type--row-margin">';
				rows += '<div class="row">';
				rows += '<div class="column small-12">';
				rows += '<div class="inventory__header-wrapper">';
				rows += '<h4 class="inventory__header inventory__header--h3">';
				rows += term;
				rows += '</h4>';
				rows += '</div>';
				rows += '</div>';
				rows += '</div>';
			}
			if(count % 3 == 0) { rows += '<div class="row equalizer" data-equalizer>'; }
			rows += '<div class="column small-12 medium-4">';
			rows += '<div class="inventory__post" data-equalizer-watch>';
			rows += '<div class="inventory__post-title-wrapper">';
			rows += '<h5 class="inventory__post-title inventory__post-title--h5">';
			rows += postTitle;
			rows += '</h5>';
			rows += '</div>';
			rows += '<div class="inventory__registration-number-wrapper">';
			rows += '<span class="inventory__registration-number">';
			rows += registrationNumber;
			rows += '</span>';
			rows += '</div>';
			rows += '<div class="inventory__image-wrapper">';
			rows += '<div class="inventory__' + availability + '"><span>Just Sold!</span></div>';
			rows += '<img class="inventory__image" src="' + featuredImage + '" />';
			rows += '</div>';
			rows += '<div class="inventory__price-wrapper">';
			rows += '<span class="inventory__price">';
			rows += availprice;
			rows += '</span>';
			rows += '</div>';
			rows += '<div class="inventory__summary-wrapper">';
			rows += summary;
			rows += '</div>';
			rows += '<div class="inventory__button-wrapper">';
			rows += '<a class="inventory__permalink link__button" href="' + permalink + '">';
			rows += '<span class="inventory__button">';
			rows += 'View Aircraft';
			rows += '</span>';
			rows += '</a>';
			rows += '</div>';
			rows += '</div>';
			rows += '</div>';
			if(count % 3 == 2) { rows += '</div>'; }
			count++;
		}
		rows += '</div>';
		this.inventoryView.innerHTML = rows;
	},
	ajaxCall: function(t) {
		if(t) {
			var term = t;
		} else {
			var term = 'all';
		}
		var _this = this;
		$(_this.inventoryView).fadeTo('1000', 0, function () {
		});
		$.ajax({
			method: 'GET',
			url: ajaxurl,
			data: {'action': 'create_card', 'term': term},
			success: function(data) {
				var _data = data;
				_this.handleData(_data);
			}
		})
		.done(function( data ) {
		    $(_this.inventoryView).fadeTo('300', 1, function () {
		    });
		});
	},
	handleEvent: function() {
		var term = this.el.options[this.el.selectedIndex].value.toLowerCase();
		$('#selector__current-selection').html(term);
		this.ajaxCall(term);
	}
}