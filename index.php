
    <?php include 'header.php'; ?>

    <body>
    
     <?php include 'navigation.php'; ?>
     <?php include 'banner.php'; ?>

      <!--learning-->
      <div class="content1">
         <div class="container">
          <?php include 'learning.php' ?>
            <div class="clearfix"></div>
            <!--explore-->
            <div class="explore">
               <h3>Explore Our Digital Library</h3>
               <p>View our complete range of courses below, or refine the list by selecting an option in any of the selection boxes below.</p>
               <div class="row filters">
                  <div class="col-md-4">
                     <?php include 'engineering-stream.php'; ?>
                  </div>

                  <div class="col-md-4">
                     <?php include 'technology-stream.php'; ?>
                  </div>

                  <div class="col-md-4">
                    <?php include 'job-role-stream.php'; ?>
                  </div>

                  <div class="col-md-4">
                    <?php include 'industry-stream.php'; ?>
                  </div>

                  <div class="col-md-4">
                     <?php include 'level-stream.php'; ?>
                  </div> 

                  <div class="col-md-4">
                     <button class="btn-secondary reset" data-filter="*">Reset Values</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--courses-->

  <?php include 'display-courses.php'; ?>

  <?php include 'footer.php'; ?>