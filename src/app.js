document.addEventListener('DOMContentLoaded', function() {
	//JSON
	//	(function(e) {
	//		const xhr = new XMLHttpRequest();
	//		xhr.open('GET', 'courses.json', true);
	//
	//		xhr.onload = function() {
	//			if (this.status === 200) {
	//				const courses = JSON.parse(this.responseText);
	//				courses.sort(dynamicSort('course_name'));
	//
	//				let output = '';
	//
	//				courses.forEach((course) => {
	//					output += `
	//                 <div class="course-desc ${course.course_eng_stream} ${course.course_technology} ${course.course_job_roles} ${course.course_industry} ${course.course_level}">
	//                 <img src="images/${course.course_image}" alt="">
	//                 <h4>${course.course_name}</h4>
	//                 <strong>Online Course</strong>
	//                 <span class="course-links">${course.course_sublinks} </span>
	//                 <a href="${course.course_link}" class="learn-more">Learn More</a>
	//                 </div>
	//                 `;
	//				});
	//
	//				//document.querySelector('.grid').innerHTML = output;
	//			}
	//		};
	//		xhr.send();
	//	})();

	//ISOTOPE init Isotope
	function courseSort() {
		setTimeout(function() {
			var $grid = $('.grid').isotope({
				itemSelector: '.course-desc',
				layoutMode: 'fitRows',
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

				setTimeout(function() {
					if ($('.course-desc:visible').length === 0) {
						$('.no-results').css('display', 'block');
					} else {
						$('.no-results').css('display', 'none');
					}
				}, 500);
			});

			// flatten object by concatting values
			function concatValues(obj) {
				var value = '';
				for (var prop in obj) {
					value += obj[prop];
				}
				return value;
			}
		}, 1000);
	}
	courseSort();

	//dynamic sort
	function dynamicSort(property) {
		var sortOrder = 1;

		if (property[0] === '-') {
			sortOrder = -1;
			property = property.substr(1);
		}

		return function(a, b) {
			if (sortOrder == -1) {
				return b[property].localeCompare(a[property]);
			} else {
				return a[property].localeCompare(b[property]);
			}
		};
	}

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
	}, 1000);
});
