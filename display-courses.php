<div class="content2">
    <div class="container">
    <p class="no-results">Sorry there are no results, try a different selection</p>
    <section class="courses">
        <div class="grid" id="courses"></div>
           
           
           <script id="course-template" type="text/x-handlebars-template">
           {{#each course}}
           <div class="course-desc {{course_eng_stream}}">               
                 <img src="images/1.png" alt="">
                 <h4>{{course_name}}</h4>
                 <strong>Online Course</strong>
                 <span class="course-links">{{course_sublinks}}</span>
                 <a href="./course-details.php?id={{id}}" class="learn-more">Learn More</a> 
                <p> {{#if page_image}}{{page_image}}{{else}}unknown{{/if}}</p>
            </div>
            {{/each}}
           </script>
           
       
    </section>
    <div class="clearfix"></div>
    
    <section class="footer-register">
        <a class="reg" href="">Register</a>
        <a class="login" href="">Login</a>
    </section>
    </div>
</div>