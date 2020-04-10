
<?php include 'header.php'; ?>

<body class="page-course-details">

<?php include 'navigation.php'; ?>

               
<section class="ind-courses">
      <div class="container">
        <h2>About this Course</h2> 
                <div class="row">

                          
<a href="./index.php">back</a>     
            
  <div class="" id="courses"></div>
           
           
           <script id="course-template" type="text/x-handlebars-template">
            <h4>APPLICABLE INDUSTRIES</h4>
             {{course_details.industries}}
             
              <h4>HIGHLIGHTS</h4>
             {{course_details.highlights}}

            <h4>TECHNIQUES AND SKILLS FOCUSED HERE</h4>
           {{course_details.technique_skills}}

                
           </script>                          
             
<section class="ind-courses">
      <div class="container">
        <h2>About this Course</h2>
        <div class="row">
         {{#with course_details}}
            <div class="col-md-7">
                <h3>Duration of Course : 60 Hours</h3>
                
                {{#if course_details}}
               <h4>APPLICABLE INDUSTRIES</h4>
                {{course_details}}
                {{/if}}
                
                <h4>HIGHLIGHTS</h4>
                {{#if highlights}}
                  <h4>APPLICABLE INDUSTRIES</h4>
                {{highlights}}
                {{/if}}
               
                
                <h4>TECHNIQUES AND SKILLS FOCUSED HERE</h4>
                {{#if technique_skills}}
                  <h4>APPLICABLE INDUSTRIES</h4>
                {{technique_skills}}
                {{/if}}
             
            </div>
            
            <div class="col-md-5">
              <section class="courseimg">
              <img src="images/1a.png" alt=""><br/>

              <video class="vdisurl" src="https://mtc-learning.com/pluginfile.php/488/course/summary/simulation_with_TP.mp4?time=1580805721030" style="width:100%;" controls=""></video>
              </section>
            </div>
            
            {{/#with}}

        </div>
      </div>
      </section>
      

<?php include 'display-courses.php'; ?>

<?php include 'footer.php'; ?>