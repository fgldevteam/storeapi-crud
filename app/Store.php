<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = ["id", 'store_number', 'banner_id', 'district_id', 'classification_id', 'status_id',
    						 'name', 'address1', 'city', 'province', 'postal_code', 'lat', 'long', 'sqft', 
    						 'mall_entrance', 'entrances', 'cashbanks', 'floors', 'registers', 'pdts',
    						 'tablets', 'last_reno', 'last_computer_update'];

    public static function createStore(Request $request)
    {
    	   $storenumber = $request->get('storenumber');

           if (isset(preg_split('/^0/', $storenumber)[1])) {
                $storeid = (int) preg_split('/^0/', $storenumber)[1];
           }
           else{
            $storeid = (int) $storenumber;
           }

           Store::create([
                'id' => $storeid,
                'store_number'  => $request->get('storenumber'),
                'name'          => $request->get('storename'),
                'address1'      => $request->get('address'),
                'city'          => $request->get('city'),
                'province'      => $request->get('province'),
                'postal_code'   => $request->get('postalcode'),
                'banner_id'     => $request->get('banner'),
                'classification_id'=>$request->get('classification'),
                'district_id'   => $request->get('district'),
                'status_id'     => $request->get('status'),
                'sqft'          => $request->get('sqft'),
                'mall_entrance' => $request->get('mall_entrance'),
                'entrances'     => $request->get('no_of_entrances'),
                'cashbanks'     => $request->get('no_of_cashbanks'),
                'floors'        => $request->get('no_of_floors'),
                'registers'     => $request->get('no_of_registers'),
                'pdts'          => $request->get('no_of_pdts'),
                'tablets'       => $request->get('no_of_tablets'),
                'last_reno'     => $request->get('last_reno'),
                'last_computer_update' =>$request->get('last_computer_update')


            ]);

    }
    public static function updateStore(Request $request,$id){
        
        $store = Store::findOrFail($id);

        $store['name']          = $request->get('storename');
        $store['address1']      = $request->get('address');
        $store['city']          = $request->get('city');
        $store['province']      = $request->get('province');
        $store['postal_code']   = $request->get('postalcode');
        $store['banner_id']     = $request->get('banner');
        $store['classification_id']= $request->get('classification');
        $store['district_id']   = $request->get('district');
        $store['status_id']     = $request->get('status');
        $store['sqft']          = $request->get('sqft');
        $store['mall_entrance'] = $request->get('mall_entrance');
        $store['entrances']     = $request->get('no_of_entrances');
        $store['cashbanks']     = $request->get('no_of_cashbanks');
        $store['floors']        = $request->get('no_of_floors');
        $store['registers']     = $request->get('no_of_registers');
        $store['pdts']          = $request->get('no_of_pdts');
        $store['tablets']       = $request->get('no_of_tablets');
        $store['last_reno']     = $request->get('last_reno');
        $store['last_computer_update'] = $request->get('last_computer_update');

        $store->save();
    }

    public static function getStoreDetails($id)
    {
    	return Store::where('id', $id)->first();
    }

    public static function getAllStores($sort = null)
    {
  
    	$storesCollection = Store::all()->sortBy($sort) ;
    	return $storesCollection;
    }

    public static function getSearchList()
    {
        $stores = Store::select(
                    \DB::raw("CONCAT (id, ' - ' , name, ' , ', city ) as label, id as value")
                )->lists("label", "value");
        
        $searchList = [];
        
        foreach ($stores as $value => $label) {
            $searchItem = [
                'value' => $value,
                'label' => $label,
            ];
            array_push($searchList, ($searchItem) );
            
        }   
        
        return ( json_encode ( $searchList ) );
    }

    public static function getProvinceList()
    {
        $provinceList = \DB::table('stores')->distinct()->lists('province');
        return json_encode($provinceList);

    }
    
    public static function getCityList()
    {
        $cityList = \DB::table('stores')->distinct()->lists('city');
        return json_encode( $cityList );
    }

    public static function getDistrictList()
    {
        $districtList = \DB::table('districts')->lists('name', 'id');
        return json_encode($districtList);    
    }

    public static function getBannerList()
    {
        $bannerList = \DB::table('banners')->lists('name', 'id');
        return json_encode($bannerList);
    }

    public static function getReportData($query){
        
        // $queryParams = preg_split('/ /', $query);
        // $queryParams[2] = preg_replace('/\'/', '', $queryParams[2]);
        
        // if ($queryParams[0] == 'district') {
        //     $district = \DB::table('districts')->where('name', $queryParams[2])->first();
        //     $queryParams[0] = 'district_id';
        //     $queryParams[2] = $district->id;
        // }
        
        // $result = \DB::table('stores')->where($queryParams[0], $queryParams[1], $queryParams[2])->get();
        // \Log::info($result);
        $result= \DB::table('stores')->whereRaw($query)->get();
        \Log::info($result);
        return $result;
    }

}
