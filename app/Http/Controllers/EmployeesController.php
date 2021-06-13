<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Employees::all();
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    Employees::validateFields($request);
    $data = new Employees;
    $data->First_name = $request->First_name;
    $data->Last_name = $request->Last_name;
    $data->Company = $request->Company;
    $data->email = $request->email;
    $data->phone = $request->phone;
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
   * @param  \App\Employees  $employees
   * @return \Illuminate\Http\Response
   */
  public function show(Employees $employees)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Employees  $employees
   * @return \Illuminate\Http\Response
   */
  public function edit(Employees $employees)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Employees  $employees
   * @return \Illuminate\Http\Response
   */
  public function update($idd, Request $request)
  {
    Employees::validateFields($request);
    $data = Employees::find($idd);
    if (empty($data)) {
      $res = array(
        'message' => 'enter a valid id',
        'code' => 201,
      );
      echo json_encode($res);
      exit;
    }
    $data->First_name = $request->First_name;
    $data->Last_name = $request->Last_name;
    $data->Company = $request->Company;
    $data->phone = $request->phone;
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
   * @param  \App\Employees  $employees
   * @return \Illuminate\Http\Response
   */
  public function destroy($idd)
  {
    $data = Employees::find($idd);
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
