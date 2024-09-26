
@extends('layouts.master')
<?php 
  if(!isset($_COOKIE['breast_cancer']) )
    $_COOKIE['breast_cancer'] = 'arabic';
  $en =TRUE;
  if($_COOKIE['breast_cancer'] == 'arabic'){
    $en = FALSE;
  }
?>

<?php
  if($en)
{
  ?>
@section('content')
  <!-- ***** Main Banner Area Start ***** -->
  <section class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
          <style> 
            .la-logo{
              font-family: "Mr Bedford";
              font-size:70px;
              margin:20px;
              color:#ff5676;
            }
            </style>
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mr+Bedford" />
            <h6>Welcome to <span class='la-logo'>la</span> </h6>
            <h2>Best Place to Diagnose  <em>Breast Cancer!</em>
            <div class="main-button-gradient">
              <!-- <div class="scroll-to-section"><a href="http://127.0.0.1:8000/Detect-Tumor">I got a mammo!</a></div> -->
              <a style='z-index:20000000000;' href="http://127.0.0.1:8000/Detect-Tumor">I got a mammo!</a>
            </div>
          </h2>
            
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="images/banner-right-image.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6></h6>
            <h4>Most powerful <em>breast cancer</em> awareness campaigns </h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01.png" alt="">
                </div>
                <h4>WhatNormalFeelsLike</h4>
                <p>Launched by breast cancer awareness organization CoppaFeel!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02.png" alt="">
                </div>
                <h4>Nobody’s Immune to Breast Cancer</h4>
                <p>Getting breast cancer doesn’t mean your immune system is weak.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03.png" alt="">
                </div>
                <h4>Know Your Lemons</h4>
                <p>It only takes a minute to check for a bad seed.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04.png" alt="">
                </div>
                <h4>Check it before it’s removed</h4>
                <p>Breast cancer affects one in eight women in their lifetime.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01.png" alt="">
                </div>
                <h4>WhatNormalFeelsLike</h4>
                <p>Launched by breast cancer awareness organization CoppaFeel!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02.png" alt="">
                </div>
                <h4>Nobody’s Immune to Breast Cancer</h4>
                <p>Getting breast cancer doesn’t mean your immune system is weak.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03.png" alt="">
                </div>
                <h4>Know Your Lemons</h4>
                <p>It only takes a minute to check for a bad seed.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04.png" alt="">
                </div>
                <h4>Check it before it’s removed</h4>
                <p>Breast cancer affects one in eight women in their lifetime.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01.png" alt="">
                </div>
                <h4>WhatNormalFeelsLike</h4>
                <p>Launched by breast cancer awareness organization CoppaFeel!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02.png" alt="">
                </div>
                <h4>Nobody’s Immune to Breast Cancer</h4>
                <p>Getting breast cancer doesn’t mean your immune system is weak.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03.png" alt="">
                </div>
                <h4>Know Your Lemons</h4>
                <p>It only takes a minute to check for a bad seed.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04.png" alt="">
                </div>
                <h4>Check it before it’s removed</h4>
                <p>Breast cancer affects one in eight women in their lifetime.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h4> <em>breast cancer</em> Signs </h4>
            <h6>these signs are the most common signs for breast cancer</h6>
          </div>
        </div>
        <div class="col-lg-12 signs">
          <div class="owl-service-item owl-carousel">
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01-signs.png" alt="">
                </div>
                <h4>Lump in the breast or armpit</h4>
                <!-- <p>Launched by breast cancer awareness organization CoppaFeel!</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02-signs.png" alt="">
                </div>
                <h4>Nipple discharge</h4>
                <!-- <p>Getting breast cancer doesn’t mean your immune system is weak.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03-signs.png" alt="">
                </div>
                <h4>Charger in breast appearance</h4>
                <!-- <p>It only takes a minute to check for a bad seed.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04-signs.png" alt="">
                </div>
                <h4>Itching on the breasts</h4>
                <!-- <p>Breast cancer affects one in eight women in their lifetime.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-05-signs.png" alt="">
                </div>
                <h4>Red or swollen breasts</h4>
                <!-- <p>Launched by breast cancer awareness organization CoppaFeel!</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-06-signs.png" alt="">
                </div>
                <h4>Pain in the breast or chest area</h4>
                <!-- <p>Getting breast cancer doesn’t mean your immune system is weak.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-07-signs.png" alt="">
                </div>
                <h4>Nipples become sensitive</h4>
                <!-- <p>It only takes a minute to check for a bad seed.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01-signs.png" alt="">
                </div>
                <h4>Lump in the breast or armpit</h4>
                <!-- <p>Breast cancer affects one in eight women in their lifetime.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02-signs.png" alt="">
                </div>
                <h4>Nipple discharge</h4>
                <!-- <p>Launched by breast cancer awareness organization CoppaFeel!</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03-signs.png" alt="">
                </div>
                <h4>Charger in breast appearance</h4>
                <!-- <p>Getting breast cancer doesn’t mean your immune system is weak.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04-signs.png" alt="">
                </div>
                <h4>Itching on the breasts</h4>
                <!-- <p>It only takes a minute to check for a bad seed.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-05-signs.png" alt="">
                </div>
                <h4>Red or swollen breasts</h4>
                <!-- <p>Breast cancer affects one in eight women in their lifetime.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6></h6>
            <h4>You can Beat <em> Breast Cancer</em></h4>
            <p>Early Detection Can Solve The problem</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="active gradient-border"><span>The First Lady Diagnosis</span></div>
                    <div class="gradient-border"><span>Never Lose Hope</span></div>
                    <div class="gradient-border"><span>Hard Work Will Never Betray You</span></div>
                    <!-- <div class="gradient-border"><span>WordPress</span></div> -->
                  </div>
                </div>
                <div class="col-lg-9">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-01.jpg" alt="">
                          <div class="price"><h6>2018</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>The First Lady Asma al-Assad</h4>
                          <p>In 2018, wife of President Bashar al-Assad, started treatment for breast cancer detected at an early stage.
                          <br><br>
                          <br><br>
                          <br><br>
                          <br><br>
                        </p>
                          <span>8</span>
                          <span>8</span>
                          <span class="last-span">2018</span>
                          <div class="text-button">
                            <!-- <a href="contact-us">Subscribe Course</a> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-02.jpg" alt="">
                          <div class="price"><h6>2019</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>Never Lose Hope</h4>
                          <p>Later, the presidency published a picture of the first lady, Asma al-Assad, holding a laptop in one hand, a cup in the other, and a bandage on her left wrist, and commented: “I am from this people who taught the world in perseverance, strength and facing difficulties... and my determination stems from your determination and steadfastness.” previous years..”
                            <br><br></p>
                          <span>28</span>
                          <span>1</span>
                          <span class="last-span">2019</span>
                          <div class="text-button">
                            <!-- <a href="contact-us">Subscribe Course</a> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-03.jpg" alt="">
                          <div class="price"><h6>2019</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>Hard Work Will Never Betray You</h4>
                          <p>
                          In an interview with Syrian TV on Saturday, she announced that she had been cured of cancer, a year after she was diagnosed with a malignant breast tumor.
                          Al-Assad said in the interview, which was broadcast on Saturday evening, "My journey is over (...) Praise be to God, I have completely defeated cancer."
                            <br><br>
                            <br><br>
                          </p>
                          <span>3</span>
                          <span>8</span>
                          <span class="last-span">2019</span>
                          <div class="text-button">
                            <!-- <a href="contact-us">Subscribe Course</a> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-04.jpg" alt="">
                          <div class="price"><h6>$76</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>WordPress Introduction</h4>
                          <p>Quinoa roof party squid prism sustainable letterpress cray hammock tumeric man bun mixtape tofu subway tile cronut. Deep v ennui subway tile organic seitan.<br><br>Kogi VHS freegan bicycle rights try-hard green juice probably haven't heard of them cliche la croix af chillwave.</p>
                          <span>48 Hours</span>
                          <span>4 Weeks</span>
                          <span class="last-span">2 Certificates</span>
                          <div class="text-button">
                            <a href="contact-us">Subscribe Course</a>
                          </div>
                        </div>
                      </div>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 offset-lg-1">
          <div class="left-image">
            <img src="/images/cta-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h6></h6>
          <h4>See Propabilities of Where You Might Have Tumors</h4>
          <!-- <p>Kogi VHS freegan bicycle rights try-hard green juice probably haven't heard of them cliche la croix af chillwave.</p> -->
          <div class="white-button">
            <!-- <a href="contact-us">View Courses</a> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Our Method</h6>
            <h4>How do we do the work <em></em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            <div class="item">
              <p>“First, we clean input image and prepare it for a neural network”</p>
                <h4>Cleaning Image And Detecting Tumors</h4>
                <span>Swin &amp; Transformer</span>
                <img src="/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Then we predict breast density using another neural network”</p>
                <h4>Breast Density</h4>
                <span>CNN</span>
                <img src="/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Finaly, we read patient info and then predict Pathology”</p>
                <h4>Pathology Prediction</h4>
                <span>CNN</span>
                <img src="/images/quote.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- 
  <section class="contact-us" id="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div id="map">
          
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7151.84524236698!2d-122.19494600413192!3d47.56605883252286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5490695e625f8965%3A0xf99b055e76477def!2sNewcastle%20Beach%20Park%20Playground%2C%20Bellevue%2C%20WA%2098006%2C%20USA!5e0!3m2!1sen!2sth!4v1644335269264!5m2!1sen!2sth" width="100%" height="420px" frameborder="0" style="border:0; border-radius: 15px; position: relative; z-index: 2;" allowfullscreen=""></iframe>
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Phone</h4>
                  <span>010-020-0340</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Mobile</h4>
                  <span>090-080-0760</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Contact us</h6>
                  <h4>Say <em>Hello</em></h4>
                  <p>IF you need a working contact form by PHP script, please visit TemplateMo's contact page for more info.</p>
                </div>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Full Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-gradient-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-12">
          <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <p class="copyright">Copyright © 2022 EduWell Co., Ltd. All Rights Reserved. 
          
          <br>Design: <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </section> -->
@endsection
<?php } else { ?>
@section('content')
  <!-- ***** Main Banner Area Start ***** -->
  <section class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="images/banner-right-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
          <style> 
            .la-logo{
              font-family: "Mr Bedford";
              font-size:70px;
              margin:20px;
              color:#ff5676;
            }
            </style>
          <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mr+Bedford" />
            <h6 style='font-size:40px;'><span class='la-logo'>la</span> مرحبا بك في </h6>
            <h2> المكان الأفضل لتشخيص 
            <em>سرطان الثدي!</em>
            <div class="main-button-gradient">
              <!-- <div class="scroll-to-section"><a href="http://127.0.0.1:8000/Detect-Tumor">I got a mammo!</a></div> -->
              <a style='z-index:20000000000;' href="http://127.0.0.1:8000/Detect-Tumor">!لدي ماموغرام</a>
            </div>
          </h2>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6></h6>
            <h4>أشهر حملات  <em>سرطان الثدي</em> </h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01.png" alt="">
                </div>
                <h4>WhatNormalFeelsLike</h4>
                <p>تم إطلاقها من قبل منظمة سرطان الثدي CoppaFeel!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02.png" alt="">
                </div>
                <h4>Nobody’s Immune to Breast Cancer</h4>
                <p>الإصابة بسرطان الثدي لا يعني أن مناعتك ضعيفة!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03.png" alt="">
                </div>
                <h4>Know Your Lemons</h4>
                <p>الأمر لا يستغرق أكثر من دقيقة لإجراء الفحص!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04.png" alt="">
                </div>
                <h4>Check it before it’s removed</h4>
                <p>يصيب سرطان الثدي كل امرأة من أصل 8 خلال حياتهم!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01.png" alt="">
                </div>
                <h4>WhatNormalFeelsLike</h4>
                <p>تم إطلاقها من قبل منظمة سرطان الثدي CoppaFeel!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02.png" alt="">
                </div>
                <h4>Nobody’s Immune to Breast Cancer</h4>
                <p>الإصابة بسرطان الثدي لا يعني أن مناعتك ضعيفة!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03.png" alt="">
                </div>
                <h4>Know Your Lemons</h4>
                <p>الأمر لا يستغرق أكثر من دقيقة لإجراء الفحص!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04.png" alt="">
                </div>
                <h4>Check it before it’s removed</h4>
                <p>يصيب سرطان الثدي كل امرأة من أصل 8 خلال حياتهم!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01.png" alt="">
                </div>
                <h4>WhatNormalFeelsLike</h4>
                <p>تم إطلاقها من قبل منظمة سرطان الثدي CoppaFeel!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02.png" alt="">
                </div>
                <h4>Nobody’s Immune to Breast Cancer</h4>
                <p>الإصابة بسرطان الثدي لا يعني أن مناعتك ضعيفة!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03.png" alt="">
                </div>
                <h4>Know Your Lemons</h4>
                <p>الأمر لا يستغرق أكثر من دقيقة لإجراء الفحص!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04.png" alt="">
                </div>
                <h4>Check it before it’s removed</h4>
                <p>يصيب سرطان الثدي كل امرأة من أصل 8 خلال حياتهم!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h4> من أعراض <em>سرطان الثدي</em></h4>
            <h6>الأعراض التالية هي من أشهر أعراض سرطان الثدي</h6>
          </div>
        </div>
        <div class="col-lg-12 signs">
          <div class="owl-service-item owl-carousel">
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01-signs.png" alt="">
                </div>
                <h4>كتلة في الثدي أو الإبط</h4>
                <!-- <p>Launched by breast cancer awareness organization CoppaFeel!</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02-signs.png" alt="">
                </div>
                <h4>خروج مواد كيميائية من الحلمة</h4>
                <!-- <p>Getting breast cancer doesn’t mean your immune system is weak.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03-signs.png" alt="">
                </div>
                <h4>ظهور غريب في الثدي</h4>
                <!-- <p>It only takes a minute to check for a bad seed.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04-signs.png" alt="">
                </div>
                <h4>حكة أو هيجان في الثدي</h4>
                <!-- <p>Breast cancer affects one in eight women in their lifetime.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-05-signs.png" alt="">
                </div>
                <h4>ثدي أحمر أو منتفخ</h4>
                <!-- <p>Launched by breast cancer awareness organization CoppaFeel!</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-06-signs.png" alt="">
                </div>
                <h4>ألم في منطقة الصدي أو الثدي</h4>
                <!-- <p>Getting breast cancer doesn’t mean your immune system is weak.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-07-signs.png" alt="">
                </div>
                <h4>حلمة حساسة</h4>
                <!-- <p>It only takes a minute to check for a bad seed.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-01-signs.png" alt="">
                </div>
                <h4>كتلة في الثدي أو الإبط</h4>
                <!-- <p>Breast cancer affects one in eight women in their lifetime.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-02-signs.png" alt="">
                </div>
                <h4>خروج مواد كيميائية من الحلمة</h4>
                <!-- <p>Launched by breast cancer awareness organization CoppaFeel!</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-03-signs.png" alt="">
                </div>
                <h4>ظهور غريب في الثدي</h4>
                <!-- <p>Getting breast cancer doesn’t mean your immune system is weak.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-04-signs.png" alt="">
                </div>
                <h4>حكة أو هيجان في الثدي</h4>
                <!-- <p>It only takes a minute to check for a bad seed.</p> -->
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="/images/service-icon-05-signs.png" alt="">
                </div>
                <h4>ثدي أحمر أو منتفخ</h4>
                <!-- <p>Breast cancer affects one in eight women in their lifetime.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6></h6>
            <h4>بإمكانك هزيمة <em> سرطان الثدي</em></h4>
            <p>يمكن حل المشكلة من خلال الكشف المبكر</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="active gradient-border"><span>تشخيص السيدة الأولى</span></div>
                    <div class="gradient-border"><span>لا تفقد الأمل</span></div>
                    <div class="gradient-border"><span>العمل الجاد لن يخيب أملك</span></div>
                    <!-- <div class="gradient-border"><span>WordPress</span></div> -->
                  </div>
                </div>
                <div class="col-lg-9">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-01.jpg" alt="">
                          <div class="price"><h6>2018</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>السيدة الأولى أسماء الأسد</h4>
                          <!-- <p>In 2018, wife of President Bashar al-Assad, started treatment for breast cancer detected at an early stage. -->
                          <p>في عام 2018، تم تشخيص السيدة الأولى عقيلة السيد الرئيس بشار الأسد بسرطان الثدي، حيث بدأت العلاج مباشرة  بأمل نابع من تشخيصها المبكر
                          <br><br>
                          <br><br>
                          <br><br>
                          <br><br>
                        </p>
                          <span>8</span>
                          <span>8</span>
                          <span class="last-span">2018</span>
                          <div class="text-button">
                            <!-- <a href="contact-us">Subscribe Course</a> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-02.jpg" alt="">
                          <div class="price"><h6>2019</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>لا تفقد الأمل</h4>
                          <!-- <p>Later, the presidency published a picture of the first lady, Asma al-Assad, holding a laptop in one hand, a cup in the other, and a bandage on her left wrist, and commented: “I am from this people who taught the world perseverance, strength and facing difficulties... and my determination stems from your determination and steadfastness.” previous years..” -->
                          <p>لاحقاً، نشرت صفحة الرئاسة صورة للسيدة الأولى، تحمل الحاسب الشخصي في يدها الأولى، وفي يدها الثانية السيروم، معلّقة: "أنا من هذا الشعب الذي علّم العالم الصمود والقوّة ومجابهة الصعاب.. وعزيمتى نابعة من عزيمتكم وثباتكم كلّ السنوات السابقة.."
                            <br><br></p>
                          <span>28</span>
                          <span>1</span>
                          <span class="last-span">2019</span>
                          <div class="text-button">
                            <!-- <a href="contact-us">Subscribe Course</a> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-03.jpg" alt="">
                          <div class="price"><h6>2019</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>العمل الجاد لن يخيب أملك</h4>
                          <p>
                          أعلنت أسماء الأسد، زوجة الرئيس السوري بشار الأسد، في مقابلة مع التلفزيون السوري شفاءها من مرض السرطان بعد عام على تشخيص إصابتها بورم خبيث في الثدي. وقالت الأسد في المقابلة التي بثت مساء السبت (الثالث من آب/ أغسطس 2019): "رحلتي انتهت (...) الحمد الله خلصت، انتصرت على السرطان بالكامل".
                            <br><br>
                            <br><br>
                          </p>
                          <span>3</span>
                          <span>8</span>
                          <span class="last-span">2019</span>
                          <div class="text-button">
                            <!-- <a href="contact-us">Subscribe Course</a> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="/images/courses-04.jpg" alt="">
                          <div class="price"><h6>$76</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>WordPress Introduction</h4>
                          <p>Quinoa roof party squid prism sustainable letterpress cray hammock tumeric man bun mixtape tofu subway tile cronut. Deep v ennui subway tile organic seitan.<br><br>Kogi VHS freegan bicycle rights try-hard green juice probably haven't heard of them cliche la croix af chillwave.</p>
                          <span>48 Hours</span>
                          <span>4 Weeks</span>
                          <span class="last-span">2 Certificates</span>
                          <div class="text-button">
                            <a href="contact-us">Subscribe Course</a>
                          </div>
                        </div>
                      </div>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 offset-lg-1">
          <div class="left-image">
            <img src="/images/cta-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h6></h6>
          <h4>توزع احتمال ظهور ورم الثدي حسب المنطقة من الجسم</h4>
          <!-- <p>Kogi VHS freegan bicycle rights try-hard green juice probably haven't heard of them cliche la croix af chillwave.</p> -->
          <div class="white-button">
            <!-- <a href="contact-us">View Courses</a> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>منهجنا</h6>
            <h4>كيف نقوم بعملنا <em></em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            <div class="item">
              <p>“أولاً، يتم تنظيف الصورة الدخل وتجهيزها للشبكة العصبونية”</p>
                <h4>تنظيف الصورة وكشف مواقع الأورام</h4>
                <span>Swin &amp; Transformer</span>
                <img src="/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“ثم يتم توقع كثافة الثدي باستخدام شبكة عصبونية اخرى”</p>
                <h4>كثافة الثدي</h4>
                <span>CNN</span>
                <img src="/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“أخيراً، بعد إدخال معلومات المريض يتم التشخيص باستخدام شبكة عصبونية.”</p>
                <h4>توقع التشخيص</h4>
                <span>CNN</span>
                <img src="/images/quote.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
<?php 
  } 
?>