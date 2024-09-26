<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\AjaxImage;
use Illuminate\Support\Facades\DB;
Intervention\Image\ImageServiceProvider::class;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use App\Models\calcification;
use App\Models\mass;

class TumorController extends Controller
{
    //
    public function storeImage(){
        // $data= new Postimage();
        $maxname = DB::table('calcifications')->max('imageNumber');
        return $maxname;
    }

    public function mass_prediction(Request $request)
    {
        try{
            $mass_id = Uuid::uuid4();
        $pure_shapes = array('ARCHITECTURAL_DISTORTION','OVAL','IRREGULAR','LYMPH_NODE','LOBULATED','FOCAL_ASYMMETRIC_DENSITY','ROUND','ASYMMETRIC_BREAST_TISSUE');
        $all_margins = array('SPICULATED', 'ILL_DEFINED', 'CIRCUMSCRIBED', 'OBSCURED', 'MICROLOBULATED');
        $shapes = array();
        $margins = array();
        $shapes_encoding = '';
        foreach($pure_shapes as $shape){
            if($request[$shape])
            {
                array_push($shapes,$shape);
                $shapes_encoding = $shapes_encoding . '1';
            }
            else
                $shapes_encoding = $shapes_encoding . '0';
        }
        $margins_encoding = '';
        foreach($all_margins as $margin){
            if($request[$margin])
            {
                array_push($margins,$margin);
                $margins_encoding = $margins_encoding . '1';
            }
            else
                $margins_encoding = $margins_encoding . '0';
        }
        $data = [
            "margins" => $margins,
            "breast_density" => $request['density'],
            "shapes" => $shapes,
            "abnormality_id" => $request['abnormality'],
            "id" => $mass_id
        ];
        // print_r('this is breast density')
        Storage::disk('public')->put($request['filename'].'_patient_info.json', json_encode($data));
        
        shell_exec("copy /y ".storage_path()."\\app\\public\\".$request['filename']."_patient_info.json ..\\python_project\\kedro-introduction-tutorial-master\\data\\13_Patient_mass_info\\patient_mass_info.json");
        shell_exec("..\\python_project\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\python_project\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline pathology-mass-prediction");
        shell_exec("copy /y ..\\python_project\\kedro-introduction-tutorial-master\\data\\14_Patient_pathology\\patient_pathology.json ".storage_path()."\\app\\public\\".$request['filename']."_mass_pathology.json");
        $json_content = file_get_contents(storage_path() . "\\app\\public\\".$request['filename']."_mass_pathology.json");
        $pathology = json_decode($json_content, true);
        $content = json_decode($pathology, true);
        $maxname = DB::table('masses')->max('imageNumber');
        $mass = new mass;
        $mass['id'] = $mass_id;
        $mass['age'] = 1;
        $mass['breastDensity'] = $request['density'];
        $mass['breastFeedingDays'] = 0;
        $mass['massMargin'] =  $margins_encoding;
        $mass['massShape'] = $shapes_encoding;
        $mass['abnormalityId'] = $request['abnormality'];
        $mass['imageNumber'] = $maxname+1;
        $mass['predictedPathology'] = array_search(max($content),$content);
        $mass['date'] =  now();
        $mass->save();
        if($request['filename'] ==NULL)
            throw new Exception();

        $currentFilePath = storage_path()."\\app\\public\\". $request['filename'] . "_mass_pathology.json";
        $newFilePath = storage_path()."\\app\\public\\mass\\pathology\\". ($maxname+1) . ".json";
        $fileMoved = rename($currentFilePath, $newFilePath);
        $currentFilePath = "..\\python_project\\kedro-introduction-tutorial-master\\data\\11_Breast_Density\\clean_mammogram.png";
        $newFilePath = storage_path()."\\app\\public\\mass\\clean_mammograms\\". ($maxname+1) . ".png";
        $fileMoved = rename($currentFilePath, $newFilePath);
        $currentFilePath = "temp\\".$request['filename']."_unet.png";
        $newFilePath = storage_path()."\\app\\public\\mass\\unet_results\\". ($maxname+1) . ".png";
        $fileMoved = rename($currentFilePath, $newFilePath);
        $currentFilePath = "temp\\".$request['filename']."_rcnn.png";
        $newFilePath = storage_path()."\\app\\public\\mass\\mask_rcnn_results\\". ($maxname+1) . ".png";
        $fileMoved = rename($currentFilePath, $newFilePath);
        $currentFilePath = "temp\\".$request['filename']."_faster.png";
        $newFilePath = storage_path()."\\app\\public\\mass\\faster_mask_rcnn_results\\". ($maxname+1) . ".png";
        $fileMoved = rename($currentFilePath, $newFilePath);
        $currentFilePath = "temp\\".$request['filename']."_cascade.png";
        $newFilePath = storage_path()."\\app\\public\\mass\\cascade_mask_rcnn_results\\". ($maxname+1) . ".png";
        $fileMoved = rename($currentFilePath, $newFilePath);
        return response()->json([
                    'success'   => 'Image Upload Successfully',
                    'class_name'  => 'alert-success',
                    'imageName' => $request['filename'],
                    'pathology' => $pathology,
                    'margins_encoding' => $margins_encoding,
                    'shapes_encoding' => $shapes_encoding,
                    'final_result' => array_search(max($content),$content),
                    'id' => $mass_id
                    ]);
        }
        catch (Exception $ex) {
            return $ex->getMessage();
        }
        
    //   return response()->json(['error'=>'$validator->errors()->all()']);

    }
    public function calc_prediction(Request $request)
    {
        try{
            $calc_id = Uuid::uuid4();
            $pure_types = array("AMORPHOUS","PLEOMORPHIC", "PUNCTATE", "COARSE", "VASCULAR", "FINE_LINEAR_BRANCHING", "LARGE_RODLIKE", "DYSTROPHIC","LUCENT_CENTER", "ROUND_AND_REGULAR", "SKIN","MILK_OF_CALCIUM","EGGSHELL");
            $all_distribution = array('CLUSTERED', 'LINEAR', 'REGIONAL', 'DIFFUSELY_SCATTERED', 'SEGMENTAL');
            $types = array();
            $dists = array();
            $types_encoding = '';
            foreach($pure_types as $type){
                if($request[$type])
                {
                    array_push($types,$type);
                    $types_encoding = $types_encoding . '1';
                }
                else
                    $types_encoding = $types_encoding . '0';
            }
            $dists_encoding = '';
            foreach($all_distribution as $dist){
                if($request[$dist])
                {
                    array_push($dists,$dist);
                    $dists_encoding = $dists_encoding . '1';
                }
                else
                    $dists_encoding = $dists_encoding . '0';
            }
            $data = [
                "types" => $types,
                "breast_density" => $request['density'],
                "distributions" => $dists,
                "abnormality_id" => $request['abnormality'],
                "id" => $calc_id
            ];
            Storage::disk('public')->put($request['filename'].'_patient_info.json', json_encode($data));
            
            shell_exec("copy /y ".storage_path()."\\app\\public\\".$request['filename']."_patient_info.json ..\\python_project\\kedro-introduction-tutorial-master\\data\\12_Patient_calc_info\\patient_calc_info.json");
            shell_exec("..\\python_project\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\python_project\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline pathology-calc-prediction");
            shell_exec("copy /y ..\\python_project\\kedro-introduction-tutorial-master\\data\\14_Patient_pathology\\patient_pathology.json ".storage_path()."\\app\\public\\".$request['filename']."_calc_pathology.json");
            $json_content = file_get_contents(storage_path() . "\\app\\public\\".$request['filename']."_calc_pathology.json");
            $pathology = json_decode($json_content, true);
            $content = json_decode($pathology, true);
            $maxname = DB::table('calcifications')->max('imageNumber');
            $calc = new calcification;
            $calc['id'] = $calc_id;
            $calc['age'] = 1;
            $calc['breastDensity'] = $request['density'];
            $calc['breastFeedingDays'] = 0;
            $calc['calcType'] =  $types_encoding;
            $calc['calcDistribution'] = $dists_encoding;
            $calc['abnormalityId'] = $request['abnormality'];
            $calc['imageNumber'] = $maxname+1;
            $calc['predictedPathology'] = array_search(max($content),$content);
            $calc['date'] =  now();
            $calc->save();
            $currentFilePath = storage_path()."\\app\\public\\". $request['filename'] . "_calc_pathology.json";
            $newFilePath = storage_path()."\\app\\public\\calc\\pathology\\". ($maxname+1) . ".json";
            $fileMoved = rename($currentFilePath, $newFilePath);
            $currentFilePath = "..\\python_project\\kedro-introduction-tutorial-master\\data\\11_Breast_Density\\clean_mammogram.png";
            $newFilePath = storage_path()."\\app\\public\\calc\\clean_mammograms\\". ($maxname+1) . ".png";
            $fileMoved = rename($currentFilePath, $newFilePath);
            $currentFilePath = "temp\\".$request['filename']."_unet.png";
            $newFilePath = storage_path()."\\app\\public\\calc\\unet_results\\". ($maxname+1) . ".png";
            $fileMoved = rename($currentFilePath, $newFilePath);
            $currentFilePath = "temp\\".$request['filename']."_rcnn.png";
            $newFilePath = storage_path()."\\app\\public\\calc\\mask_rcnn_results\\". ($maxname+1) . ".png";
            $fileMoved = rename($currentFilePath, $newFilePath);
            $currentFilePath = "temp\\".$request['filename']."_faster.png";
            $newFilePath = storage_path()."\\app\\public\\calc\\faster_mask_rcnn_results\\". ($maxname+1) . ".png";
            $fileMoved = rename($currentFilePath, $newFilePath);
            $currentFilePath = "temp\\".$request['filename']."_cascade.png";
            $newFilePath = storage_path()."\\app\\public\\calc\\cascade_mask_rcnn_results\\". ($maxname+1) . ".png";
            $fileMoved = rename($currentFilePath, $newFilePath);
            return response()->json([
                        'success'   => 'Image Upload Successfully',
                        'class_name'  => 'alert-success',
                        'imageName' => $request['filename'],
                        'pathology' => $pathology,
                        'dists_encoding' => $dists_encoding,
                        'types_encoding' => $types_encoding,
                        'final_result' => array_search(max($content),$content),
                        'id' => $calc_id
                        ]);
            }
        catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function SaveImage_DetectDensity(Request $request)
    {
       try{
        $request->validate([
            'image' => 'required|image|mimes:jfif,jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName =  time().'' ;
        $imageParh = $imageName . '.png';
        // $imageName = ($maxname+1) . '.png' ;
        $request->image->move(public_path('temp'), $imageParh);
        shell_exec("copy /y temp\\".$imageParh." ..\\python_project\\kedro-introduction-tutorial-master\\data\\10_Breast_cancer\\raw_mammogram.png");
        shell_exec("..\\python_project\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\python_project\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline breast-density-prediction");
        shell_exec("copy /y ..\\python_project\\kedro-introduction-tutorial-master\\data\\15_patient_breast_density\\patient_breast_density.json ".storage_path()."\\app\\public\\".$imageName."_breast_density.json");
        // $breast_density = 1;
        $breast_density = json_decode(file_get_contents(storage_path() . "\\app\\public\\".$imageName."_breast_density.json"), true);
        return response()->json([
                    'success'   => 'Image Upload Successfully',
                    // 'uploaded_image' => '<img src="/images2/'.$input['image'].'" class="img-thumbnail" width="300" />',
                    'class_name'  => 'alert-success',
                    'imageName' => $imageName,
                    'breast_density' => $breast_density,
                    'path' => storage_path()
                    ]);
       }
       catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function unet_detection(Request $request)
    {
        $path = $request->filename;
        
        shell_exec("..\\python_project\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\python_project\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline unet-mammogram-mask-prediction");
        shell_exec("copy /y ..\\python_project\\kedro-introduction-tutorial-master\\data\\10_Breast_cancer\\unet_result.png temp\\".$path ."_unet.png");
        
        // $maxname = DB::table('calcifications')->max('imageNumber');
        // $imageName = time() . '.png';
        // $imageName = ($maxname+1) . '.png' ;
        // $request->image->move(public_path('temp'), $imageName);
        return response()->json([
                    'success'   => 'Image Upload Successfully',
                    // 'uploaded_image' => '<img src="/images2/'.$input['image'].'" class="img-thumbnail" width="300" />',
                    'class_name'  => 'alert-success',
                    'imageName' => $path
                    ]);
    //   return response()->json(['error'=>'$validator->errors()->all()']);

    }
    public function cascade_detection(Request $request)
    {
        $path = $request->filename;
        shell_exec("..\\python_project\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\python_project\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline swin-cascade-rcnn-mammogram-mask-prediction");
        shell_exec("copy /y ..\\python_project\\kedro-introduction-tutorial-master\\data\\10_Breast_cancer\\swin_cascade_result.png temp\\".$path ."_cascade.png");
        return response()->json([
                    'success'   => 'Image Upload Successfully',
                    'class_name'  => 'alert-success',
                    'imageName' => $path
                    ]);
    }
    public function rcnn_detection(Request $request)
    {
        $path = $request->filename;
        shell_exec("..\\python_project\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\python_project\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline swin-mask-rcnn-mammogram-mask-prediction");
        shell_exec("copy /y ..\\python_project\\kedro-introduction-tutorial-master\\data\\10_Breast_cancer\\swin_rcnn_result.png temp\\".$path ."_rcnn.png");

        return response()->json([
                    'success'   => 'Image Upload Successfully',
                    'class_name'  => 'alert-success',
                    'imageName' => $path
                    ]);
    }
    public function faster_detection(Request $request)
    {
        $path = $request->filename;
        shell_exec("..\\python_project\\kedro-introduction-tutorial-master\\venv2\\Scripts\\python ..\\python_project\\kedro-introduction-tutorial-master\\kedro_cli.py run --pipeline swin-faster-rcnn-mammogram-mask-prediction");
        shell_exec("copy /y ..\\python_project\\kedro-introduction-tutorial-master\\data\\10_Breast_cancer\\swin_faster_result.png temp\\".$path ."_faster.png");

        return response()->json([
                    'success'   => 'Image Upload Successfully',
                    'class_name'  => 'alert-success',
                    'imageName' => $path
                    ]);

    }
    
}
