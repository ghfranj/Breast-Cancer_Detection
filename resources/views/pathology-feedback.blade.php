
@extends('layouts.master')



@section('content')

  <section class="page-heading">
  <section class="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-8" style='z-index:2; !important'>
          <div id="map">
            <form action="post" id='upload_form' enctype='multipart/form-data'>
              <button type='submit' class="upload-btn" >Submit</button>
              @csrf
              <div class="upload-container" >
                <input type="file" required id="file_upload" name='jsonfile'/>
                <!-- <input type="text" hidden id="filename" class='filename' name='filename'/> -->
              </div>
            </form>
          </div>
          <div id="info">
            <h3 style='color:#51468d;  margin:20px;'>Report</h3>
            <h4 class='case'>Case: <span>Classification</span></h4>
            <hr>
            <h4 class='att1'>Calcification Distribution: <span style='font-size:smaller;'>ill_defined</span></h4>  
            <hr>
            <h4 class='att2'>Calcification type(s): <span style='font-size:smaller;'>ill_defined, spiculated</span></h4>  
            <hr>
            <h4  class='density'>Breast Density: <span style='font-size:smaller;'>2</span></h4>  
            <hr>
            <h4 class='abnor'>Abnormality Id: <span style='font-size:smaller;'>2</span></h4>  
            <hr>            
            <img src="temp/1660387891_cascade.png" class='clean_mammo' alt=""> 
            
          </div>
        </div>
        <div class="col-lg-4">
          <!-- <div action="" method="post"> -->
          <!-- style='filter:blur(20px);pointer-events:none;' -->
          <div id="contact" class="row " style='filter:blur(20px);pointer-events:none;'>
            <div class="col-lg-10 offset-lg-1">
              <div class="contact-info">
                <input type="radio" checked hidden name='case' id='mass'>
                <label for="mass" class="label-for-pathology mass-radio"><h4><span id='instance_type' style='font-size:20px;'>Mass</span></h4></label>
              </div>
            </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////// -->
            <form id='patient_form' class="patient_form row pathology-form" action='post'>
            @csrf
              <input type="text" hidden value='' name='case' id='case'>
              <input type="text" value='' hidden name='uuid' id='uuid'>
              <hr class=' mass_form'>
              <div class="col-lg-12">
                <fieldset>
                  <h5>Real Pathology 
                    <select name="realPathology" id="realPathology" style='margin:20px;'>
                      <option value="malignant">Malignant</option>
                      <option value="benign">Benign</option>
                      <!-- <option value="begnignWithoutCallback">Benign Without Callback</option> -->
                    </select>
                  </h5>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <h5>Breast Feeding Days <input type="number" style='width:20% !important;' name='breastFeedingDays' min=0/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <h5>Number Of Children <input name='numberOfChildren' style='width:20% !important;'  type="number" min=0/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <h5>Age <input name='age' type="number" min=15/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <h5>Date <input  name='date' style='width:50% !important;' type="date"/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <h5>Real Mask <input  name='realMask' style='width:50% !important;' type="file"/></h5>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-gradient-button">Submit form</button>
                </fieldset>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  </section>


<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src='http://malsup.github.com/jquery.form.js'></script> -->
  <script>
      $(document).ready(function(){
          $('#info').hide();
          $('#benign-value').html( '' + 0 + '%');
          $('#melignant-value').html( '' + 0 + '%');
          $('#bwc-value').html('' + 0 + '%');
          $('#final-pathology-value').html('');
          // $('.more-info').hide();
          $('#upload_form').on('submit', function(event){
            var imageName = '-1';
            $('#upload_form').attr('style','display:none');
            // $('.filename').val('imageName');
            var th = document.getElementById('upload_form');
            event.preventDefault();
            $.ajax({
              url:"{{ url('find_record') }}",
              method:"POST",
              data: new FormData(th),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
              event.preventDefault();
                // alert(Object.keys(data));
                // if()
                $('.case').html('Case: <span>'+ data.case +'</span>');
                // alert(data.case);
                if(data.case == 'mass'){
                  $('.clean_mammo').attr('src', 'clean_mammogram.png');
                  var pure_shapes = ['ARCHITECTURAL_DISTORTION','OVAL','IRREGULAR','LYMPH_NODE','LOBULATED','FOCAL_ASYMMETRIC_DENSITY','ROUND','ASYMMETRIC_BREAST_TISSUE'];
                  var all_margins = ['SPICULATED', 'ILL_DEFINED', 'CIRCUMSCRIBED', 'OBSCURED', 'MICROLOBULATED'];
                  var shapes = 'null'; 
                  for(var i=0; i<8; i++){
                    if(data.massShape[i]=='1'){
                      if(shapes=='null'){
                        shapes = pure_shapes[i];
                      }
                      else{
                        shapes = shapes + ', ' + pure_shapes[i];
                      }
                    }
                  }
                // alert(data.case);

                  $('.att1').html('Mass Shape(s): <span>'+ shapes +'</span>');
                  var margins = 'null';
                  for(var i=0; i<5; i++){
                    if(data.massMargin[i]=='1'){
                      if(margins=='null'){
                        margins = all_margins[i];
                      }
                      else{
                        margins = margins + ', ' + all_margins[i];
                      }
                    }
                  }
                  $('.att2').html('Mass margin(s): <span>'+ margins +'</span>');
                }
                else
                {
                    $('.clean_mammo').attr('src',  'clean_mammogram.png' );
                    var pure_types = ["AMORPHOUS","PLEOMORPHIC", "PUNCTATE", "COARSE", "VASCULAR", "FINE_LINEAR_BRANCHING", "LARGE_RODLIKE", "DYSTROPHIC","LUCENT_CENTER", "ROUND_AND_REGULAR", "SKIN","MILK_OF_CALCIUM","EGGSHELL"];
                    var all_distribution = ['CLUSTERED', 'LINEAR', 'REGIONAL', 'DIFFUSELY_SCATTERED', 'SEGMENTAL'];
                    var types = 'null';
                    for(var i=0; i<13; i++){
                      if(data.calcType[i]=='1'){
                        if(types=='null'){
                          types = pure_types[i];
                        }
                        else{
                          types = types + ', ' + pure_types[i];
                        }
                      }
                    }
                    // alert(data.case);

                    $('.att1').html('Calcification Type(s): <span>'+ types +'</span>');
                    var distributions = 'null';
                    for(var i=0; i<5; i++){
                      if(data.calcDistribution[i]=='1'){
                        if(distributions=='null'){
                          distributions = all_distribution[i];
                        }
                        else{
                          distributions = distributions + ', ' + all_distribution[i];
                        }
                      }
                    }
                    $('.att2').html('Calcification distribution(s): <span>'+ distributions +'</span>');
                    
                }
                $('.density').html('Breast Density: <span>'+ data.breastDensity +'</span>');
                $('.abnor').html('Abnormality Id: <span>'+ data.abnormalityId +'</span>');
                $('.case').html('Case: <span>'+ data.case +'</span>');

                Swal.fire(
                  'Record Found successfully',
                  'Enter your feedback in the corresponding form',
                  'success'
                );
                $('#case').val(data.case);
                $('#instance_type').html(data.case);
                $('#uuid').val(data.id);
                
                $('#contact').css('filter', 'none');
                $('#contact').css('pointer-events', 'auto');
                $('#upload_form').hide();
                $('#info').show();
              },
              error: function(data){
                Swal.fire(
                  'Record not found!',
                  'maybe record not found or some missing info!',
                  'warning'
                );
                // alert(data.responseText);
              }
            });
          });
          $('#patient_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
              url:"{{ url('update_record') }}",
              method:"POST",
              data: new FormData(this),
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                Swal.fire(
                  'Updated Successfully!',
                  'record updated successfully!',
                  'success'
                );
              },
              error: function(data){
                alert(data.responseText);
                Swal.fire(
                  'Something went wront, please try again!',
                  'maybe record not found or some missing info!',
                  'warning'
                );
              }
            });
          });
        });
  </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function export_uuid(_case, uuid) {
  const originalData = {
    case: _case,
    UUID: uuid
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
  background: '#af6f6fa9',
  imageAlt: 'Result Ready!',
  // 'justify-self': end;
});
}
</script>

@endsection