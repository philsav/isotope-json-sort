<?php include 'header.php'; ?>

<body class="page-course-details">

<?php include 'navigation.php'; ?>
<section class="ind-courses">
      <div class="container">
         <h2>About this Course</h2>
  
        <div class="" id="courses"></div>
           
           <script id="course-template" type="text/x-handlebars-template">

           <div class="row">               
            <div class="col-md-7">

            <h4>{{course_name}}</h4>

            <h4>APPLICABLE INDUSTRIES</h4>
            {{{course_details.industries}}}

            <h4>HIGHLIGHTS</h4>
            {{course_details.highlights}}

            <h4>TECHNIQUES AND SKILLS FOCUSED HERE</h4>
            {{course_details.technique_skills}}
            
          </div>

          <div class="col-md-5">
          <img src="" alt="">
           </div>      
          
            </div>
           </script>
           
           </div>
    </section>

  <div class="clearfix"></div>

  <?php include 'no-register.php'; ?>

  <?php include 'footer.php'; ?>