<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function showReports()
    {
        $searchList  = Store::getSearchList();
        $cityList = Store::getCityList();
        $provinceList = Store::getProvinceList();
        $districtList = Store::getDistrictList();
        $bannerList = Store::getBannerList();
        return view('report.view')->with('searchList', $searchList)
                                 ->with('cityList', $cityList)
                                 ->with('provinceList', $provinceList)
                                 ->with('districtList', $districtList)
                                 ->with('bannerList', $bannerList);
    }

    public function buildReports(Request $request)
    {   

        $rawQuery = $request->get('sql');
        foreach ($rawQuery as $key => $value) {
             $query = $value;
         } 
        $filename = $request->get('filename');
        
        if (isset($query)) {
            
            $result = Store::getReportData($query);
            
            /* file to be downloaded*/
            if (isset($filename)) {
                if ( !empty($result) ) {
                    Excel::create( $filename , function($excel) use($result) {

                        $excel->sheet('sheet1', function($sheet) use($result) {
                            
                            /* Create Headings*/
                            
                            $tableHeadings = [];
                            foreach ($result[0] as $key=>$value) {
                                array_push($tableHeadings, $key);
                            }
                            $sheet->appendRow( $tableHeadings );

                            /* Enter Data*/
                            foreach ($result as $res) {
                                
                                $res_array = (array) $res;
                                $sheet->appendRow($res_array);
                                
                            }

                        });

                    })->store('xls', public_path('reports'));
                }
                 $filepath = ('/reports/'.$filename.".xls");
                return compact('filepath', 'result' );
            }
            /* file not to be downloaded*/
            else{
                return compact('result');
            }
           
        } 
        
        return [];
        
    }

}
