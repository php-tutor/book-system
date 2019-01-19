<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MobilePhones;
use App\Manufacturers;
use App\Http\Requests\CreateMobilePhone;


class MobilePhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $allMobilePhones = MobilePhones::all();
      return view('mobile-phones.index')->with('allMobilePhones', $allMobilePhones);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $manufacturersModel = new Manufacturers();

      $allManufacturers = $manufacturersModel::all()->pluck('name', 'id');
      $allManufacturers = ['' => 'Select Manufacturer'] + $allManufacturers->all();

      return view('mobile-phones.create')->with('allManufacturers', $allManufacturers);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMobilePhone $request)
    {
      $manufacturer_id = $request->get('manufacturer_id');
      if (empty($manufacturer_id)) {
        print 'error!';die;
      }

      $mobilePhone = new MobilePhones([
        'name' => $request->get('name'),
        'manufacturer_id' => $request->get('manufacturer_id')
      ]);
      $mobilePhone->save();

      return redirect('mobile-phones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
