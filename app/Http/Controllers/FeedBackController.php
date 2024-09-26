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
class FeedBackController extends Controller
{
    public function find_record(Request $request)
    {
        try{
            $jsonfile = $request->jsonfile;
            $jsonpath = 'data.json';
            $request->jsonfile->move(public_path('temp'), $jsonpath);
            $jsoncontent = json_decode(file_get_contents( "temp\\".$jsonpath), true);
            if($jsoncontent['case']== 'mass'){
                $instance =  DB::table('masses')->find($jsoncontent['UUID']);
                $instance->case = 'mass';
                copy(storage_path(). '/app/public/mass/clean_mammograms/' . $instance->imageNumber . '.png', public_path() . '/clean_mammogram.png');
            }
            else
            {
                $instance =  DB::table('calcifications')->find($jsoncontent['UUID']);
                $instance->case = 'calc';
                copy(storage_path(). '/app/public/calc/clean_mammograms/' . $instance->imageNumber . '.png', public_path() . '/clean_mammogram.png');
            }
            return $instance;
        }
        catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function update_record(Request $request)
    {
        try{
            
            if($request->case == 'calc')
            {
                $instance = DB::table('calcifications')->where('id',$request->uuid)->limit(1)->update(['age' => $request->age,
                                    'date' => $request->date,
                                    'breastFeedingDays' => $request->breastFeedingDays,
                                    'realPathology' => $request->realPathology,
                                    'numberOfChildren' => $request->numberOfChildren,
                                    ]);

                $instance =  DB::table('calcifications')->find($request->uuid);
                $instance->case = 'Calcification';
                $maxname = $instance->imageNumber;
                $imagePath = storage_path()."\\app\\public\\calc\\real_mask\\" ;
                $request->realMask->move($imagePath, $maxname . ".png");
                return $instance;
            }
            else
            {
                $instance = DB::table('masses')->where('id',$request->uuid)->limit(1)->update(['age' => $request->age,
                                    'date' => $request->date,
                                    'breastFeedingDays' => $request->breastFeedingDays,
                                    'realPathology' => $request->realPathology,
                                    'numberOfChildren' => $request->numberOfChildren,
                                    ]);
                $instance =  DB::table('masses')->find($request->uuid);
                $instance->case = 'mass';
                $maxname = $instance->imageNumber;
                $imagePath = storage_path()."\\app\\public\\mass\\real_mask\\" ;
                $request->realMask->move($imagePath, $maxname . ".png");
                return $instance;
            }
        }
        catch (Exception $ex) { 
            return $ex->getMessage();
        }
    }
}
