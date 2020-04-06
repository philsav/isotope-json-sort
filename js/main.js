// external js: isotope.pkgd.js

// init Isotope
var $grid = $('.grid').isotope({
	itemSelector: '.course-desc'
});

// store filter for each group
var filters = {};

$('.filters').on('change', function(event) {
	var $select = $(event.target);
	// get group key
	var filterGroup = $select.attr('value-group');
	// set filter for group
	filters[filterGroup] = event.target.value;
	// combine filters
	var filterValue = concatValues(filters);
	// set filter for Isotope
	$grid.isotope({ filter: filterValue });
});

// flatten object by concatting values
function concatValues(obj) {
	var value = '';
	for (var prop in obj) {
		value += obj[prop];
	}
	return value;
}
