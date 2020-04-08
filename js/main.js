document.addEventListener('DOMContentLoaded', function() {
	//JSON
	(function(e) {
		const xhr = new XMLHttpRequest();
		xhr.open('GET', 'courses.json', true);

		xhr.onload = function() {
			if (this.status === 200) {
				const courses = JSON.parse(this.responseText);
				courses.sort(dynamicSort('course_name'));

				let output = '';

				courses.forEach((course) => {
					output += `
                  <div class="course-desc ${course.course_eng_stream} ${course.course_technology} ${course.course_job_roles}">               
                 <img src="images/${course.course_image}" alt="">
                 <h4>${course.course_name}</h4>
                 <strong>Online Course</strong>
                 <span class="course-links">Automobile Engineering | Robotics | Design & Development | Automotive | Diploma</span>
                 <a href="${course.course_link}" class="learn-more">Learn More</a>                
                 </div>
                 `;
				});

				document.querySelector('.grid').innerHTML = output;
			}
		};
		xhr.send();
	})();

	//ISOTOPE init Isotope
	function courseSort() {
		setTimeout(function() {
			var $grid = $('.grid').isotope({
				itemSelector: '.course-desc',
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
});

// $('.reset').on('click', function() {
// 	$('.no-results').css('display', 'none');
// 	$('.grid').isotope({
// 		filter: filterValue
// 	});
// 	//reset the dropdowns
// 	$('select').each(function() {
// 		$(this).val($('#' + $(this).attr('id') + ' option:first').val());
// 	});
// });

// $('.reset').click(function() {
// 	$('select').each(function() {
// 		$(this).val($('#' + $(this).attr('id') + ' option:first').val());
// 	});
// });

//hide empty
// $('.filters').on('change', function(event) {
// 	setTimeout(function() {
// 		if ($('.course-desc:visible').length === 0) {
// 			$('.no-results').css('display', 'block');
// 		}
// 	}, 1000);
// });
