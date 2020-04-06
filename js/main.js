document.addEventListener('DOMContentLoaded', function() {
	//JSON
	(function(e) {
		const xhr = new XMLHttpRequest();
		xhr.open('GET', 'courses.json', true);

		xhr.onload = function() {
			if (this.status === 200) {
				const courses = JSON.parse(this.responseText);
				let output = '';

				courses.forEach((course) => {
					output += `
                  <div class="course-desc ${course.course_eng_stream} ${course.course_technology} ${course.course_job_roles}">               
                 <img src="images/${course.course_image}" alt="">
                 <h4>${course.course_name}</h4>
                 <strong>Online Course</strong>
                 <span class="course-links"><a href="">Automobile Engineering | Robotics | Design & Development | Automotive | Diploma</a></span>
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
	setTimeout(function() {
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
	}, 1000);
});
