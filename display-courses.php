<div class="content2">
    <div class="container">
    <p class="no-results">Sorry there are no results, try a different selection</p>
    <section class="courses">
        <div class="grid" id="courses"></div>
           
           <script id="course-template" type="text/x-handlebars-template">
           {{#each course}}
           <div class="course-desc {{course_eng_stream}} {{course_technology}} {{course_job_roles}} {{course_industry}} {{course_level}}">             
                 <img src="images/{{course_image}}" alt="" loading="lazy" class="lazy">
                 <h4>{{course_name}}</h4>
                 <strong>{{course_type}}</strong>
                 <span class="course-links">{{{course_sublinks}}}</span>
                 <a href="./course-details.php?id={{@index}}" class="learn-more">Learn More</a> 
                <!-- <p> {{#if page_image}}{{page_image}}{{else}}unknown{{/if}}</p> -->
            </div>
            {{/each}}
           </script>
       
    </section>
    <div class="clearfix"></div>
    
