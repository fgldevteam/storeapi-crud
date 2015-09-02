<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store;

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
        $query = $request->get('sql');
        if (isset($query)) {
            $result = Store::getReportData($query);
            return $result;
        } 
        return [];
        
    }

}
