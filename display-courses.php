<div class="content2">
    <div class="container">
    <p class="no-results">Sorry there are no results, try a different selection</p>
    <section class="courses">
        <div class="grid" id="courses"></div>
           
           <script id="course-template" type="text/x-handlebars-template">
           {{#each course}}
           <div class="course-desc {{course_eng_stream}}">               
                 <img src="images/{{course_image1}}" alt="">
                 <h4>{{course_name}}</h4>
                 <strong>Online Course</strong>
                 <span class="course-links">{{course_sublinks}}</span>
                 <a href="./course-details.php?id={{@index}}" class="learn-more">Learn More</a> 
                <p> {{#if page_image}}{{page_image}}{{else}}unknown{{/if}}</p>
            </div>
            {{/each}}
           </script>
           
       
    </section>
    <div class="clearfix"></div>
    
