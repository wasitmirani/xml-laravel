<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mtownsend\XmlToArray\XmlToArray;
use Illuminate\Support\Facades\URL;
use App\Models\Dump;
class TestController extends Controller
{
    //

    public function demo(){

        return view('demo');
    }

    public function send(Request $request){
        global $fileName;
        global $array;
        // $fileName = time().'.'.$request->xml_file->extension();  
   
        // $uploaded=$request->xml_file->move(public_path('uploads'), $fileName);
     
            $url=URL::to('/uploads');
        //    $objXmlDocument = simplexml_load_file($url."/1602868241.xml",);
           
         $path =$url."/PWS20200806_PIES67.xml"; 
  
// Read entire file into string 
$xmlfile = file_get_contents($path); 
  
// Convert xml string into an object 
$new = simplexml_load_string($xmlfile); 

// Convert into json 
$con = json_encode($new); 
// Convert into associative array 
$newArr = json_decode($con, true);
$json= (object)$newArr['Items'];
global $items;
foreach ($json as $value) {
    $items[]=$value;
}


foreach ($items[0] as  $value) {
    # code...
    dd( $value);
    Dump::create([
        'HazardousMaterialCode'=>!empty($value['HazardousMaterialCode'])  ? $value['HazardousMaterialCode'] :  "",
        'PartNumber'=>$value['PartNumber'],
        'BrandAAIAID'=>$value['BrandAAIAID'],
        'BrandLabel'=>$value['BrandLabel'],
        'PartTerminologyID'=>$value['PartTerminologyID']
    ]);


}

return response()->json("done");
// dd($items->item);
// dd($newArr['Items'][0]);
        
        //       $xmlString=file_get_contents("/uploads/". $fileName);
        //  $xmlObject = simplexml_load_string($xml);

        //   $json = json_encode($xmlObject);

        //  $array = json_decode($json,TRUE);
            // return $objXmlDocument->count();
       

        // foreach ($newArr['App'] as $item) {
          
        //   return  response()->json($item);
        // }
        
    }
}
