<?php

use Illuminate\Support\Facades\Route;
use App\Models\calcification;
use App\Models\mass;
use App\Http\Controllers\TumorController; 
use Illuminate\Http\Request;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\FeedBackController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


///////////////// Feedback Controller ///////////////////
Route::post('find_record', [FeedBackController::class,'find_record'])->name('find_record');
Route::post('update_record', [FeedBackController::class,'update_record'])->name('update_record');





///////////////// Tumor Controller ///////////////////
Route::post('save_image', [TumorController::class,'SaveImage_DetectDensity'])->name('save_image');
Route::post('unet_detection', [TumorController::class,'unet_detection'])->name('unet_detection');
Route::post('cascade_detection', [TumorController::class,'cascade_detection'])->name('cascade_detection');
Route::post('rcnn_detection', [TumorController::class,'rcnn_detection'])->name('rcnn_detection');
Route::post('faster_detection', [TumorController::class,'faster_detection'])->name('faster_detection');
Route::post('calc_prediction', [TumorController::class,'calc_prediction'])->name('calc_prediction');
Route::post('mass_prediction', [TumorController::class,'mass_prediction'])->name('mass_prediction');


//////////////////////////////////////////////


// Route::get('/Pathology-Feedback', [FeedBackController::class,'pathology-feedback'])->name('Pathology_Feedback');



Route::get('/Pathology-Feedback', function () {
    return view('pathology-feedback');
});


Route::get('/', function () {
    return view('index');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/change-language', function (Request $request) {
    if(isset($_COOKIE['breast_cancer'])){
        if( $_COOKIE['breast_cancer'] == 'arabic'){
            setcookie('breast_cancer', 'english', time() + (86400 * 30), "/");
        }
        else {
            setcookie('breast_cancer', 'arabic', time() + (86400 * 30), "/");
        }
    }
    else {
        session_start();
        setcookie('breast_cancer', 'english', time() + (86400 * 30), "/");
    }
    
});

Route::get('/master', function () {
    return view('layouts\master');
});

Route::get('/Detect-Tumor', function () {
    return view('Detect-Tumor');
});

// Route::get('/mass', function () {
//     // try
//     // {
//         $json_content = file_get_contents(storage_path() . "\\app\\public\\".(1659630114)."_mass_pathology.json");
//         $pathology = json_decode($json_content, true);
//         $content = json_decode($pathology, true);
//         $maxname = DB::table('masses')->max('imageNumber');
//         $mass = new mass;
//         $mass['id'] = 'mass_id2';
//         $mass['age'] = 1;
//         $mass['breastFeedingDays'] = 0;
//         $mass['massMargin'] =  '$mg11';
//         $mass['massShape'] = '$sha1111';
//         $mass['abnormalityId'] = 1;
//         $mass['imageNumber'] = 22;
//         $mass['predictedPathology'] ='MELIGNANT';
//         $mass['date'] =  now();
//         $mass->save();
//         return '<h1>this is user' .$mass. '</h1>';
//     // }
//     // catch (Exception $e) {
//     //     return view('index');
//     // }
// });


// Route::get('/sd', function () {
//     $calc = new calcification;
//     $calc['id'] = '123!@#qweQWE1';
//     $calc['age'] = 22;
//     $calc['breastFeedingDays'] = 22;
//     $calc['calcType'] = '1010100101010';
//     $calc['calcDistribution'] = '10101';
//     $calc['abnormalityId'] = 2;
//     $calc['predictedPathology'] = 'BENIGN';
//     $calc['numberOfChildren'] = 2;
//     $calc['date'] = '2021/3/12';
//     $calc->save();
//     return '<h1>this is user' . calcification::find('123!@#qweQWE1') . '</h1>';
// });

// Route::get('/What_is_a_mammogram', function(){
//     // shell_exec("C:\Users\DASUS\breastcancer\python_project/kedro-introduction-tutorial-master/venv2/Scripts/python C:\Users\DASUS\laravel\python_project\kedro-introduction-tutorial-master\kedro_cli.py run --pipeline swin-cascade-rcnn-mammogram-mask-prediction");
//     return view('index');
// })->name('What_is_a_mammogram');


// Route::get('/about-us', function(){
//     // shell_exec("C:\Users\DASUS\breastcancer\python_project/kedro-introduction-tutorial-master/venv2/Scripts/python C:\Users\DASUS\laravel\python_project\kedro-introduction-tutorial-master\kedro_cli.py run --pipeline swin-cascade-rcnn-mammogram-mask-prediction");
//     return view('about-us');
// })->name('about-us');

