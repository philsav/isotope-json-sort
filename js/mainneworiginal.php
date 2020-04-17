document.addEventListener('DOMContentLoaded', function() {
	window.addEventListener('load', function () {

	//ISOTOPE init Isotope
	function courseSort() {
		setTimeout(function() {
			var $grid = $('.grid').isotope({
				itemSelector: '.course-desc',
				layoutMode: 'fitRows',
				onLayout: function() {
					$(window).trigger('scroll');
				},
				filter: '*'
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

				$grid.isotope('on', 'arrangeComplete', function() {
					if ($('.course-desc:visible').length === 0) {
						$('.no-results').css('display', 'block');
					} else {
						$('.no-results').css('display', 'none');
					}
				});
			});

			// flatten object by concatting values
			function concatValues(obj) {
				var value = '';
				for (var prop in obj) {
					value += obj[prop];
				}
				return value;
			}
		}, 500);
	}
	courseSort();

	//reset
	$('.reset').on('click', function() {
		$('.no-results').css('display', 'none');
		courseSort();

		//reset the dropdowns
		$('select').each(function() {
			$(this).val($('#' + $(this).attr('id') + ' option:first').val());
		});
	});

	//get query string param
	function getParameterByName(name, url) {
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, '\\$&');
		var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, ' '));
	}

	//handlebars
	let coursesTemplate = $('#course-template').html();
	let compiledCoursesTemplate = Handlebars.compile(coursesTemplate);

	var courseId = getParameterByName('id');

	$.ajax('./data.json').done((allcourses) => {
		var sortedByName = allcourses.course.sort((a, b) => (a.course_name > b.course_name ? 1 : -1));
 
		allcourses.course = sortedByName;

		if ($('body').hasClass('page-course-details')) {
			$('#courses').html(compiledCoursesTemplate(allcourses.course[courseId]));
			
		} else {
			$('#courses').html(compiledCoursesTemplate(allcourses));
		}
	});

	//equal height
	setTimeout(() => {
		var maxHeight = 0;
		$('.course-desc').each(function() {
			if ($(this).height() > maxHeight) {
				maxHeight = $(this).height();
			}
		});
		$('.course-desc').height(maxHeight);
	}, 300);


	//end
});

//lazy
document.addEventListener("DOMContentLoaded", function() {
	var lazyloadImages = document.querySelectorAll("img.lazy");    
	var lazyloadThrottleTimeout;
	
	function lazyload () {
	  if(lazyloadThrottleTimeout) {
		clearTimeout(lazyloadThrottleTimeout);
	  }    
	  
	  lazyloadThrottleTimeout = setTimeout(function() {
		  var scrollTop = window.pageYOffset;
		  lazyloadImages.forEach(function(img) {
			  if(img.offsetTop < (window.innerHeight + scrollTop)) {
				img.src = img.dataset.src;
				img.classList.remove('lazy');
			  }
		  });
		  if(lazyloadImages.length == 0) { 
			document.removeEventListener("scroll", lazyload);
			window.removeEventListener("resize", lazyload);
			window.removeEventListener("orientationChange", lazyload);
		  }
	  }, 20);
	}
	
	document.addEventListener("scroll", lazyload);
	window.addEventListener("resize", lazyload);
	window.addEventListener("orientationChange", lazyload);
  });

});

