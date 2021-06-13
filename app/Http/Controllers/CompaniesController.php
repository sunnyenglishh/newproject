<?php

namespace App\Http\Controllers;

use App\Companies;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CompaniesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // return Companies::all();
    return Companies::all();
    // return view('home',$data);
  }
  public function indexx()
  {
    // return Companies::all();
    $data['data'] = Companies::all();
    return view('home',$data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // dd('create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Companies::validateFields($request);
    $fileName = $request->logo->getClientOriginalName();
    $request->logo->move(storage_path('/app/public'), $fileName);
    $filename2 = 'storage/app/public/' . $fileName;

    $data = new Companies;
    $data->Name = $request->Name;
    $data->email = $request->email;
    $data->logo =  $filename2;
    $data->website = $request->website;
    $data->save(); {
      $res = array(
        'message' => 'success',
        'code' => 200,
      );
      echo json_encode($res);
      exit;
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Companies  $companies
   * @return \Illuminate\Http\Response
   */
  public function show(Companies $companies)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Companies  $companies
   * @return \Illuminate\Http\Response
   */
  public function edit(Companies $companies)
  {
    // dd('edit');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Companies  $companies
   * @return \Illuminate\Http\Response
   */
  public function update($idd, Request $request)
  {
    Companies::validateFields($request);
    $data = Companies::find($idd);
    if (empty($data)) {
      $res = array(
        'message' => 'enter a valid id',
        'code' => 201,
      );
      echo json_encode($res);
      exit;
    }
    $fileName = $request->logo->getClientOriginalName();
    $request->logo->move(storage_path('/app/public'), $fileName);
    $filename2 = 'storage/app/public/' . $fileName;
    $data->Name = $request->Name;
    $data->email = $request->email;
    $data->logo = $filename2;
    $data->website = $request->website;
    $data->save(); {
      $res = array(
        'message' => 'updated',
        'code' => 200,
      );
      echo json_encode($res);
      exit;
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Companies  $companies
   * @return \Illuminate\Http\Response
   */
  public function destroy($idd)
  {
    $data = Companies::find($idd);
    if (empty($data)) {
      $res = array(
        'message' => 'enter a valid id',
        'code' => 201,
      );
      echo json_encode($res);
      exit;
    }
    $data->delete(); {
      $res = array(
        'message' => 'deleted',
        'code' => 200,
      );
      echo json_encode($res);
      exit;
    }
  }
}
