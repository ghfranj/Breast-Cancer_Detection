<?php 
  if(!isset($_COOKIE['breast_cancer']) )
    $_COOKIE['breast_cancer'] = 'arabic';
  $en =TRUE;
  if($_COOKIE['breast_cancer'] == 'arabic'){
    $en = FALSE;
  }
?>
@extends('layouts.master')



@section('content')

  <section class="page-heading">
  <section class="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div id="map">
            <form action="post" id='upload_form' enctype='multipart/form-data'>
              
            <button type='submit' class="upload-btn" ><?php if($en) {?> Submit<?php } else {?> إدخال <?php }?></button>
            @csrf
            <div class="upload-container" >
                  <input type="file" required id="file_upload" name='image'/>
                  <input type="text" hidden id="filename" class='filename' name='filename'/>
            </div>
            </form>
            <div class='masks-div' ><div class="row">
              <div class="col-lg-5">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-search mask-search"></i>
                  </div>
                  <h4 style='padding-top:7%;padding-right:12%;'>
                    <img src="" class='mask-logo' id='version1_logo' alt="" style='display:none;'>
                    
                    <?php if($en) {?> version 1<?php } else {?> النسخة 1 <?php }?>
                  </h4>
                  <span><img id='unet' src="" alt=""></span>
                </div>
              </div>
              
              <div class="col-lg-5">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-search mask-search"></i>
                    
                  </div>
                  <h4 style='padding-top:7%;padding-right:12%;'>
                  <img src="" class='mask-logo' alt=""  id='version2_logo'  style='display:none;'>
                  <?php if($en) {?> version 2<?php } else {?> النسخة 2 <?php }?>
                  
                </h4>
                  <span><img id='swin_cascade' src="" alt=""></span>
                </div>
              </div>
            </div>
            <section style='margin-top:70px;'></section>

            <div class="row">
              <div class="col-lg-5 ">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-search mask-search"></i>
                  </div>
                  <h4 style='padding-top:7%;padding-right:12%;'>
                    <img src="" class='mask-logo' alt=""  id='version3_logo'  style='display:none;'>
                    <?php if($en) {?> version 3<?php } else {?> النسخة 3 <?php }?>

                  </h4>
                  <span><img id='swin_rcnn'  src="" alt=""></span>
                </div>
              </div>
              
              <div class="col-lg-5">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-search mask-search"></i>
                  </div>
                  <h4 style='padding-top:7%;padding-right:12%;'>
                    <img src="" class='mask-logo' alt=""  id='version4_logo'  style='display:none;'>
                    <?php if($en) {?> version 4<?php } else {?> النسخة 4 <?php }?>

                  </h4>
                  <span><img id='swin_faster'  src="" alt=""></span>
                </div>
              </div>
            </div></div>
          </div>
        </div>
        <div class="col-lg-4 forms">
          <div id="contact" action="" method="post">
          <div class="row">
            <div class="col-lg-5 offset-lg-1">
              <div class="contact-info">
                <input type="radio" checked hidden name='case' id='mass'>
                <label for="mass" class="label-for-pathology mass-radio"><h4><span style='font-size:20px;'>
                <?php if($en) {?> Mass<?php } else {?> كتلة <?php }?>

              </span></h4></label>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="contact-info">
                <input type="radio" hidden name='case' id='calc'>
                <label for="calc" class="label-for-pathology calc-radio"><h4><span style='font-size:20px;'>
                <?php if($en) {?> Calc<?php } else {?> تكلس <?php }?>

              </span></h4></label>
              </div>
            </div>
              <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
            <form id='calc_form' class="calc_form row pathology-form" enctype='multipart/form-data'>
              <div class="col-lg-12 calc_form">
              @csrf
                <fieldset>
                  <h3>
                    
                    <?php if($en) {?> Calcification Distribution<?php } else {?> توزعات التكلس <?php }?>

                  </h3>
                  <input type="text" hidden class='filename' name='filename'/>

                  <div class='row'>
                    <div class="col-lg-4">
                      <input hidden type="checkbox" name="CLUSTERED" id="calc-CLUSTERED">
                      <label for="calc-CLUSTERED"><h7>
                        
                    <?php if($en) {?> CLUSTERED<?php } else {?> معنقدة <?php }?>

                      </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="LINEAR" id="calc-LINEAR">
                        <label for="calc-LINEAR"><h7>
                          
                    <?php if($en) {?> LINEAR<?php } else {?> خطّي<?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="REGIONAL" id="calc-REGIONAL">
                        <label for="calc-REGIONAL"><h7>
                          
                        <?php if($en) {?>REGIONAL <?php } else {?> نطاقي <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <input hidden type="checkbox" name="DIFFUSELY_SCATTERED" id="calc-DIFFUSELY_SCATTERED">
                        <label for="calc-DIFFUSELY_SCATTERED"><h7>
                          
                        <?php if($en) {?> DIFFUSELY_SCATTERED<?php } else {?> متناثرة <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4 offset-lg-2">
                        <input hidden type="checkbox" name="SEGMENTAL" id="calc-SEGMENTAL">
                        <label for="calc-SEGMENTAL"><h7>
                        
                        <?php if($en) {?> SEGMENTAL<?php } else {?> قطاعي <?php }?>

                       </h7></label>
                    </div>
                  </div>
                </fieldset>
              </div> 
              <hr class=' calc_form' >
              <div class="col-lg-12 calc_form">
                <fieldset>
                  <h3>
                    
                    <?php if($en) {?> Calcification Types<?php } else {?> أنواع التكلس <?php }?>

                  </h3>
                  <div class='row'>
                    <div class="col-lg-4">
                      <input hidden type="checkbox" name="AMORPHOUS" id="calc-AMORPHOUS">
                      <label for="calc-AMORPHOUS"><h7>
                    <?php if($en) {?> AMORPHOUS<?php } else {?> عديم الشكل <?php }?>
                        
                       </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="PLEOMORPHIC" id="calc-PLEOMORPHIC">
                        <label for="calc-PLEOMORPHIC"><h7>
                          
                        <?php if($en) {?> PLEOMORPHIC<?php } else {?> متعدد الأشكال <?php }?>
                          
                        </h7></label>
                    </div>
                    <div class="col-lg-3">
                        <input hidden type="checkbox" name="PUNCTATE" id="calc-PUNCTATE">
                        <label for="calc-PUNCTATE"><h7>
                          
                        <?php if($en) {?> PUNCTATE<?php } else {?> منقط <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="COARSE" id="calc-COARSE">
                        <label for="calc-COARSE"><h7>
                          <?php if($en) {?> COARSE<?php } else {?> خشن <?php }?>
                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="VASCULAR" id="calc-VASCULAR">
                        <label for="calc-VASCULAR"><h7>
                          <?php if($en) {?> VASCULAR<?php } else {?> وعائي الشكل <?php }?>
                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="SKIN" id="calc-SKIN">
                        <label for="calc-SKIN"><h7>
                          <?php if($en) {?> SKIN<?php } else {?> جلدي <?php }?>
                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="FINE_LINEAR_BRANCHING" id="calc-FINE_LINEAR_BRANCHING">
                        <label for="calc-FINE_LINEAR_BRANCHING"><h7>
                          
                          <?php if($en) {?> FINE_LINEAR_BRANCHING<?php } else {?> فرع خطي رفيع <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-5 offset-lg-3">
                        <input hidden type="checkbox" name="ROUND_AND_REGULAR" id="calc-ROUND_AND_REGULAR">
                        <label for="calc-ROUND_AND_REGULAR"><h7>
                          
                          <?php if($en) {?> ROUND_AND_REGULAR<?php } else {?> دائري ومنتظم <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="LARGE_RODLIKE" id="calc-LARGE_RODLIKE">
                        <label for="calc-LARGE_RODLIKE"><h7>
                          
                          <?php if($en) {?> LARGE_RODLIKE <?php } else {?> قصبي كبير <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="DYSTROPHIC" id="calc-DYSTROPHIC">
                        <label for="calc-DYSTROPHIC"><h7>
                          <?php if($en) {?> DYSTROPHIC <?php } else {?> ضامر <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="LUCENT_CENTER" id="calc-LUCENT_CENTER">
                        <label for="calc-LUCENT_CENTER"><h7>
                           
                          <?php if($en) {?> LUCENT_CENTER <?php } else {?> مركز متوهج <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4  offset-lg-1">
                        <input hidden type="checkbox" name="MILK_OF_CALCIUM" id="calc-MILK_OF_CALCIUM">
                        <label for="calc-MILK_OF_CALCIUM"><h7>
                          <?php if($en) {?> MILK_OF_CALCIUM <?php } else {?> حليب كالسيوم <?php }?>
                        </h7></label>
                    </div>
                    <div class="col-lg-4   offset-lg-2">
                        <input hidden type="checkbox" name="EGGSHELL" id="calc-EGGSHELL">
                        <label for="calc-EGGSHELL"><h7>
                          
                          <?php if($en) {?> EGGSHELL <?php } else {?> قشرة البيض <?php }?>

                        </h7></label>
                    </div>
                  </div>
                </fieldset>
              </div>
              <hr class=' calc_form'>
              <div class="col-lg-12 calc_form">
                <fieldset>
                  <h5>
                  <?php if($en) {?> Abnormality <?php } else {?> مقدار الشذوذ <?php }?>

                     
                    <input type="number" name='abnormality' value=1  max=8 min=1/></h5>
                  
                </fieldset>
              </div>
              <div class="col-lg-12 calc_form">
                <fieldset>
                  <h5>
                  <?php if($en) {?> Breast Density <?php } else {?> كثافة الثدي <?php }?>
                    <input class='breast-density' name='density' type="number" max=8 min=0/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12 calc_form">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-gradient-button">
                  <?php if($en) {?> Submit Form <?php } else {?> أدخل المعلومات للتشخيص <?php }?>
                  </button>
                </fieldset>
              </div>
            </form>
            <!-- /////////////////////////////////////////////////////////////////////////////////// -->
            <form id='mass_form' class="mass_form row pathology-form" action='post'>
              <div class="col-lg-12 mass_form">
              @csrf
                <fieldset>
                  <h3>
                    
                  <?php if($en) {?> Mass Margins <?php } else {?> حواف الكتلة <?php }?>

                  </h3>
                  <div class='row'>
                    <div class="col-lg-4">
                      <input type="text" hidden class='filename' name='filename'/>
                      <input hidden type="checkbox" name="SPICULATED" id="mass-SPICULATED">
                      <label for="mass-SPICULATED"><h7>
                        
                  <?php if($en) {?> SPICULATED <?php } else {?> مشوية <?php }?>

                      </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="ILL_DEFINED" id="mass-ILL_DEFINED">
                        <label for="mass-ILL_DEFINED"><h7>
                          
                  <?php if($en) {?> ILL_DEFINED <?php } else {?> غير معرفة <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="CIRCUMSCRIBED" id="mass-CIRCUMSCRIBED">
                        <label for="mass-CIRCUMSCRIBED"><h7>
                          
                  <?php if($en) {?> CIRCUMSCRIBED <?php } else {?> واضحة <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4 offset-lg-2">
                        <input hidden type="checkbox" name="OBSCURED" id="mass-OBSCURED">
                        <label for="mass-OBSCURED"><h7>
                          
                  <?php if($en) {?> OBSCURED <?php } else {?> مشوشة <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <input hidden type="checkbox" name="MICROLOBULATED" id="mass-MICROLOBULATED">
                        <label for="mass-MICROLOBULATED"><h7>
                          
                  <?php if($en) {?> MICROLOBULATED <?php } else {?> متناهية الصغر <?php }?>

                        </h7></label>
                    </div>
                  </div>
                </fieldset>
              </div> 
              <hr class=' mass_form'>
              <div class="col-lg-12 mass_form">
                <fieldset>
                  <h3>
                    
                  <?php if($en) {?> Mass Shape <?php } else {?> شكل الكتلة <?php }?>

                  </h3>
                  <div class='row'>
                    <div class="col-lg-8">
                      <input hidden type="checkbox" name="ARCHITECTURAL_DISTORTION" id="mass-ARCHITECTURAL_DISTORTION">
                      <label for="mass-ARCHITECTURAL_DISTORTION"><h7>
                        
                  <?php if($en) {?> ARCHITECTURAL_DISTORTION <?php } else {?>مشوهة <?php }?>

                      </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="IRREGULAR" id="mass-IRREGULAR">
                        <label for="mass-IRREGULAR"><h7>
                          
                  <?php if($en) {?> IRREGULAR <?php } else {?>غير منتظمة <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-3">
                        <input hidden type="checkbox" name="OVAL" id="mass-OVAL">
                        <label for="mass-OVAL"><h7>
                          
                  <?php if($en) {?> OVAL <?php } else {?>بيضوية <?php }?>
                        
                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="LYMPH_NODE" id="mass-LYMPH_NODE">
                        <label for="mass-LYMPH_NODE"><h7>
                          
                  <?php if($en) {?> LYMPH_NODE <?php } else {?>عقدة لمفاوية <?php }?>

                        </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="LOBULATED" id="mass-LOBULATED">
                        <label for="mass-LOBULATED"><h7>
                  <?php if($en) {?> LOBULATED <?php } else {?>مفصص <?php }?>
                          
                         </h7></label>
                    </div>
                    <div class="col-lg-4">
                        <input hidden type="checkbox" name="ROUND" id="mass-ROUND">
                        <label for="mass-ROUND"><h7>
                           
                  <?php if($en) {?> ROUND <?php } else {?>دائرية <?php }?>
                        </h7></label>
                    </div>
                    <div class="col-lg-6">
                        <input hidden type="checkbox" name="ASYMMETRIC_BREAST_TISSUE" id="mass-ASYMMETRIC_BREAST_TISSUE">
                        <label for="mass-ASYMMETRIC_BREAST_TISSUE"><h7>
                          
                  <?php if($en) {?> ASYMMETRIC_BREAST_TISSUE <?php } else {?>أنسجة ثدي غير منتظمة <?php }?>

                        </h7></label>
                    </div>
                  </div>
                </fieldset>
              </div>
              <hr class=' mass_form'>
              <div class="col-lg-12 mass_form">
                <fieldset>
                  <h5> 
                  <?php if($en) {?> Abnormality <?php } else {?>مقدار الشذوذ <?php }?>
                    
                  <input type="number" name='abnormality' value=1 max=8 min=1/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12 mass_form">
                <fieldset>
                  <h5>
                  <?php if($en) {?> Breast Density <?php } else {?>كثافة الثدي <?php }?>

                     <input class='breast-density' name='density' type="number" max=8 min=0/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12 mass_form">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-gradient-button">
                    
                  <?php if($en) {?> Submit form <?php } else {?>أدخل المعلومات للتشخيص <?php }?>

                  </button>
                </fieldset>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  </section>

  <section class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
          <?php if($en) {?> 
            <h6>This report will be saved in a json file along with his ID.</h6>
            <h6>Write main information separated by a comma.</h6>
            <h4> Patient  <em>Report</em></h4>
                    <?php } else {?>
            <h6> بالإضافة إلى الرقم المعرف الخاص به Json سيتم حفظ هذا التقرير في ملف  .</h6>
            <h6>الرجاء إدخال المعلومات بينها فواصل.</h6>
            <h4> <em>تقرير</em> المريض </h4>
                      
                       <?php }?>
          </div>
          <p>
          <textarea name="textarea" id='Report'
                rows="12" cols="55">Patient Name:</textarea></p>
        </div>
        <div class="col-lg-6 offset-lg-1 align-self-center">
          <div class="row">
            <div class="col-6">
              <div class="count-area-content">
                <div class="count-digit" id='melignant-value'>0</div>
                <div class="count-title" id='melignant'>
                  
                  <?php if($en) {?> 
                    Melignant
                    <?php } else {?>
                      خبيثة
                       <?php }?>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="count-area-content">
                <div class="count-digit" id='benign-value'>0</div>
                <div class="count-title" id='benign'>
                  <?php if($en) {?> 
                    Benign
                    <?php } else {?>
                      حميدة
                       <?php }?>
                  </div>
              </div>
            </div>
            <div class="col-6">
              <div class="count-area-content">
                <div class="count-digit" id='bwc-value'>0</div>
                <div class="count-title" id='bwc'>
                 
                  <?php if($en) {?> 
                    Benign with callbacks
                    <?php } else {?>
                      حميدة دون تأكد
                       <?php }?>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="count-area-content">
                <div class="count-digit" id='final-pathology-value'>-</div>
                <div class="count-title" id='final-pathology'>
                  <?php if($en) {?> 
                    Final Pathology: 
                    <?php } else {?>
                      التشخيص النهائي
                       <?php }?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section >
    
  </section>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src='http://malsup.github.com/jquery.form.js'></script> -->
  <script>
      var pbd = false;
      var pathologise = false;
      $(document).ready(function(){
          $('#benign-value').html( '' + 0 + '%');
          $('#melignant-value').html( '' + 0 + '%');
          $('#bwc-value').html('' + 0 + '%');
          $('#final-pathology-value').html('');
          // $('.more-info').hide();
          $('#upload_form').on('submit', function(event){
            pdb = false;
            var imageName = '-1';
            // $('.filename').val('imageName');
            var th = document.getElementById('upload_form');
            event.preventDefault();
            $('#upload_form').attr('style','display:none');
            $.ajax({
              url:"{{ url('save_image') }}",
              method:"POST",
              data: new FormData(th),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
              $('.mask-search').attr('style', 'display:none');
              $('.mask-logo').attr('style', 'display:inline');
              $('.mask-logo').attr('src', '/images/loading_mask.gif');
                imageName = data.imageName;
                $('.filename').val(imageName);
                pbd = true;
                var bd = JSON.parse(data.breast_density).breast_density;
                Swal.fire(
                  <?php if($en) {?> 
                    'Breast Density is ' + bd+ ', Please fill the report below before submitting for pathology.'
                    <?php } else {?>
                      'كثافة الثدي هي' + bd+ ', الرجاء تعبئة التقرير قبل البدء بعملية التشخيص.'
                       <?php }?>

                  );
                $('.breast-density').val(JSON.parse(data.breast_density).breast_density);
                detect_unet();
              },
              error: function(data){
                // alert(data);
                <?php if($en) {?> 
                  alert('image size is large, lower the resolution please!');
                    <?php } else {?>
                      alert('حجم الصورة كبير، الرجاء تقليل قيمة دقة الصورة!');
                       <?php }?>
                
              }
            });
          });
          $('form .calc_form').hide();
          $('form .mass_form').show();
          $('.mass-radio').on('click', function(event){
            $('form .calc_form').toggle();
            $('form .mass_form').toggle();        
          });
          $('.calc-radio').on('click', function(event){
            $('form .mass_form').toggle();
            $('form .calc_form').toggle(); 
          });
          $('#calc_form').on('submit', function(event){
            if(!pbd){
              <?php if($en) {?> 
              Swal.fire('Wait until Breast density is predicted!');
                    <?php } else {?>
              Swal.fire('الرجاء الانتظار إلى أن يتم توقع كثافة الثدي!');
                       <?php }?>
            }
            else
              if(pathologise == false)
              <?php if($en) {?> 
                Swal.fire('Wait until all versions are predicted!');
                
                    <?php } else {?>
                Swal.fire('الرجاء الانتظار إلى أن يتم توقع كل النسخ!');
                      
                       <?php }?>
            else
            {
              var th = document.getElementById('upload_form');
            // alert($('.breast-density').val());
              var form = new FormData();
              event.preventDefault();
              $.ajax({
                url:"{{ url('calc_prediction') }}",
                method:"POST",
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                  var pathology = JSON.parse(data.pathology);
                  $('#benign-value').html( '' + parseInt((pathology.BENIGN)*100) + '%');
                  $('#melignant-value').html( '' + parseInt((pathology.MELIGNANT)*100) + '%');
                  $('#bwc-value').html('' + parseInt((pathology.BENIGN_WITH_CALLBACKS)*100) + '%');
                  if(data.final_result == 'MELIGNANT')
                    $('#final-pathology').html('Final Pathology: <b style="color:red;">' + data.final_result+ '</b>');
                  else
                    $('#final-pathology').html('Final Pathology: <b style="color:lime;">' + data.final_result+ '</b>');
                  export_uuid('calcification', data.id, $('#Report').val());
                  result_ready();
                  
                pbd = false;
                pathologise = false;
                $('form')[0].reset();
                $('form')[1].reset();
                $('form')[2].reset();
                
                $('#upload_form').attr('style','display:inline');
                $('.mask-search').attr('style', 'display:inline');
                $('.mask-logo').attr('style', 'display:none');
                $('.mask-logo').attr('src', '');
                },
                error: function(data){
                  // alert(Object.keys(data));
                  alert('failure in calc prediction');
                  alert(data.responseText);
                }
              });
            }
            event.preventDefault();
          });
          $('#mass_form').on('submit', function(event){
            if(!pbd){
              Swal.fire('Wait until Breast density is predicted!');
            } else
              if(pathologise == false)
                Swal.fire('Wait until all versions are predicted!');
            else
            {
              $.ajax({
                url:"{{ url('mass_prediction') }}",
                method:"POST",
                data: new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                  var pathology = JSON.parse(data.pathology);
                  $('#benign-value').html( '' + parseInt(Math.round((pathology.BENIGN)*100)) + '%');
                  $('#melignant-value').html( '' + parseInt(Math.round((pathology.MELIGNANT)*100)) + '%');
                  $('#bwc-value').html('' + parseInt(Math.round((pathology.BENIGN_WITH_CALLBACKS)*100)) + '%');
                  if(data.final_result == 'MELIGNANT')
                    $('#final-pathology').html('Final Pathology: <b style="color:red;">' + data.final_result+ '</b>');
                  else
                    $('#final-pathology').html('Final Pathology: <b style="color:lime;">' + data.final_result+ '</b>');
                  $('#final-pathology-value').html(Math.max(Math.max(parseInt(Math.round((pathology.BENIGN)*100)), parseInt(Math.round((pathology.MELIGNANT)*100))), parseInt(Math.round((pathology.BENIGN_WITH_CALLBACKS)*100))) + '%');
                  export_uuid('mass', data.id, $('#Report').val());
                  result_ready();
                  
                  pbd = false;
                  pathologise = false;
                  $('form')[0].reset();
                  $('form')[1].reset();
                  $('form')[2].reset();
                },
                error: function(data){
                  alert(Object.keys(data));
                  alert(data.responseText);
                  alert('failure in mass prediction');
                }
              });
            }
            event.preventDefault();
            
          });
        });
      function detect_unet(){
        var th = document.getElementById('upload_form');
        $.ajax({
          url:"{{ url('unet_detection') }}",
          method:"POST",
          data: new FormData(th),
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            $('#unet').attr("src", "temp/"+data.imageName+'_unet.png');
            $('#version1_logo').attr('src', '/images/ready_mask.png');
            detect_cascade();
            
          },
          error: function(data){
            $('#version1_logo').attr('src', '/images/failed_mask.png');
            alert('failure in unet');
          }
        });
      }
      function detect_cascade(){
        var th = document.getElementById('upload_form');
        $.ajax({
          url:"{{ url('cascade_detection') }}",
          method:"POST",
          data: new FormData(th),
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            $('#swin_cascade').attr("src", "temp/"+data.imageName+'_cascade.png');
            $('#version2_logo').attr('src', '/images/ready_mask.png');
            detect_rcnn();
          },
          error: function(data){
            $('#version1_logo').attr('src', '/images/failed_mask.png');
            alert('failure in swin_cascade');
          }
        });
      }
      function detect_rcnn(){
        var th = document.getElementById('upload_form');
        $.ajax({
          url:"{{ url('rcnn_detection') }}",
          method:"POST",
          data: new FormData(th),
          dataType:'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            $('#version3_logo').attr('src', '/images/ready_mask.png');
            $('#swin_rcnn').attr("src", "temp/"+data.imageName+'_rcnn.png');
            detect_faster();
          },
          error: function(data){
            $('#version1_logo').attr('src', '/images/failed_mask.png');
            alert('failure in swin_rcnn');
          }
        });
      }
        function detect_faster(){
          var th = document.getElementById('upload_form');
          $.ajax({
            url:"{{ url('faster_detection') }}",
            method:"POST",
            data: new FormData(th),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
              $('#version4_logo').attr('src', '/images/ready_mask.png');
              $('#swin_faster').attr("src", "temp/"+data.imageName+'_faster.png');
              pathologise = true;
            },
            error: function(data){
              $('#version1_logo').attr('src', '/images/failed_mask.png');
              alert('failure in swin_faster');
            }
          });
        }
  </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function export_uuid(_case, uuid, Report) {
  const originalData = {
    case: _case,
    UUID: uuid,
    report: Report
  };

  const a = document.createElement("a");
  a.href = URL.createObjectURL(new Blob([JSON.stringify(originalData, null, 2)], {
    type: "JSON"
  }));
  a.setAttribute("download", "data.json");
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
}
// result_ready();
function result_ready(){
  Swal.fire({
  title: 'Result Ready!',
  text: 'Scroll down to see results',
  imageUrl: '/images/result_ready.gif',
  imageWidth: 100,
  imageHeight: 200,
  // text_shadow: '1px 13px 9px black',
  color:'white',
  border: '#ffffff',
  background: '#af6f6fa9',
  imageAlt: 'Result Ready!',
  // 'justify-self': end;
});
}
</script>

@endsection