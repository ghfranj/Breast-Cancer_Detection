<?php 
  if(!isset($_COOKIE['breast_cancer']) )
    $_COOKIE['breast_cancer'] = 'arabic';
  $en =TRUE;
  if($_COOKIE['breast_cancer'] == 'arabic'){
    $en = FALSE;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" href="images/templatemo-eduwell.png" />
    <title>La - For Breast Cancer Pathology</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-eduwell-style.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/lightbox.css">
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  <?php
    if($en)
    {
      ?>
        <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="/" class="logo">
                          <img src="images/templatemo-eduwell.png" alt="EduWell Template">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class=""><a href="/#services">Campaigns</a></li>
                          <!-- <li class="scroll-to-section"><a href="#courses">Courses</a></li> -->
                          <!-- <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="about-us">About Us</a></li>
                                  <li><a href="our-services">Our Services</a></li>
                                  <li><a href="contact-us">Contact Us</a></li>
                              </ul>
                          </li> -->
                          <li class=""><a href="/Detect-Tumor">Get A Pathology</a></li> 
                          <li class=""><a href="/Pathology-Feedback" class="active">Pathology Feedback</a></li>
                          <li class=""><img style="width:50px;cursor:pointer;" src="images/change_language_icon.png" alt="" onClick='change_language()'> </li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
      <?php
    }
    else{
      ?>
      <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="/" class="logo">
                          <img src="images/templatemo-eduwell.png" alt="EduWell Template">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <!-- <li class=""><a href="/" class="active">الصفحة الرئيسية</a></li> -->
                          <li class=""><a href="/#services">أشهر حملات سرطان الثدي</a></li>
                          <!-- <li class="scroll-to-section"><a href="#courses">Courses</a></li> -->
                          <!-- <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="about-us">About Us</a></li>
                                  <li><a href="our-services">Our Services</a></li>
                                  <li><a href="contact-us">Contact Us</a></li>
                              </ul>
                          </li> -->
                          <li class=""><a href="/Detect-Tumor">احصل على تشخيص</a></li> 
                          <li class=""><a href="/Pathology-Feedback" class="active">مراجعة التشخيص</a></li>
                          <li class=""><img style="width:50px;cursor:pointer;" src="images/change_language_icon.png" alt="" onClick='change_language()'> </li> 
                      </ul>
                      <a class='menu-trigger'>
                          <span>القائمة</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>

      <?php
    }
  ?>
  <!-- ***** Header Area End ***** -->

  @yield('content')
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/js/isotope.min.js"></script>
    <script src="/js/owl-carousel.js"></script>
    <script src="/js/lightbox.js"></script>
    <script src="/js/tabs.js"></script>
    <script src="/js/video.js"></script>
    <script src="/js/slick-slider.js"></script>
    <script src="/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
    <script>
      function change_language(){
        $.ajax({
              url:"{{ url('change-language') }}",
              method:"GET",
              // data: new FormData(),
              // dataType:'JSON',
              // contentType: false,
              cache: false,
              processData: false,
              success: function(){
                document.location.reload(true);
              },
              error: function(data){
                alert('failed to change language');
              }
            });
      }
    </script>
</body>

</html>
