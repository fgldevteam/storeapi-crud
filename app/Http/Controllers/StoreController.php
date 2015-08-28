<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort');
        
        if ( isset($sort)) {    
            $sort = $request->sort;
            $stores = Store::getAllStores($sort);
        }
        else{
            $stores = Store::all();
        }
        
        $searchList = \DB::table('stores')->lists('id');
        $districtsList = \DB::table('districts')->lists('name', 'id');
        return view('store.list')->with('stores', $stores)
                                 ->with('districts', $districtsList)
                                 ->with('searchList', $searchList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $districtsList = \DB::table('districts')->lists('name' , 'id');
        $classificationsList   = \DB::table('classifications')->lists('name', 'id');
        $bannersList   = \DB::table('banners')->lists('name', 'id');
        $statusList    = \DB::table('status')->lists('name', 'id');

        return view('store.create')->with('districts', $districtsList)
                                ->with('classifications', $classificationsList)
                                ->with('banners', $bannersList)
                                ->with('status', $statusList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Store::createStore($request);
        return redirect()->action('StoreController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $storeDetails = Store::getStoreDetails($id)->toArray();
        return view('store.view')->with('store', $storeDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $store = Store::where('id', $id)->first();
        $districtsList = \DB::table('districts')->lists('name' , 'id');
        $classificationsList   = \DB::table('classifications')->lists('name', 'id');
        $bannersList   = \DB::table('banners')->lists('name', 'id');
        $statusList    = \DB::table('status')->lists('name', 'id');

        return view('store.edit')->with('store', $store)
                                ->with('districts', $districtsList)
                                ->with('classifications', $classificationsList)
                                ->with('banners', $bannersList)
                                ->with('status', $statusList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        Store::updateStore($request, $id);
        return redirect()->action('StoreController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return redirect()->action('StoreController@index');
    }
}
