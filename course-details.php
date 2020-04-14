<?php include 'header.php'; ?>

<body class="page-course-details">

<?php include 'navigation.php'; ?>
<section class="ind-courses">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">     
             <a class="backlink" href="index.php#explore">Back</a></div>
          </div>

          <div class="" id="courses"></div>
           
           <script id="course-template" type="text/x-handlebars-template">  
      
           <div class="row">               
            <div class="col-md-7">

            <h2>{{course_name}}</h2>

            <h3>About this Course</h3>
            <h5>Duration of Course:</h5> {{course_details.duration}}
            
            {{#if course_details.industries}}
            <hr/>            
            <h4>APPLICABLE INDUSTRIES</h4>
            {{{course_details.industries}}}
            {{/if}}

            {{#if course_details.highlights}}
            <hr/>
            <h4>HIGHLIGHTS</h4>
            {{{course_details.highlights}}}           
            {{/if}}

            {{#if course_details.technique_skills}}
            <hr/>
            <h4>TECHNIQUES AND SKILLS FOCUSED HERE</h4>
            {{{course_details.technique_skills}}}
            {{/if}}
            <br/><br/>
          </div>

          <div class="col-md-5">
            <section class="courseimg">
            <img src="images/{{course_image}}" alt=""><br/>
            {{#if course_image2}}<img src="images/{{course_image2}}" alt="">{{/if}}

            {{#if course_video}}<video class="vdisurl" src="{{course_video}}" style="width:100%;" controls=""></video>{{/if}}

            </section>
           </div>      
          
            </div>
           </script>
           
           </div>
    </section>

  <div class="clearfix"></div>

  <?php include 'no-register.php'; ?>

  <?php include 'footer.php'; ?>