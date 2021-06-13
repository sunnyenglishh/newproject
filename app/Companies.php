<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Auth;
class Companies extends Model

{
    protected $fillable = [
        'Name','email','logo','website'
    ];
    static function validateFields($request)
    {
        $validation = [
            'Name' => ['required'],
            // 'email' => ['email','unique:Companies'],
            'logo' => ['max:2048|mimes:jpeg,jpg,png,gif|dimensions:min_width=100,min_height=100'],
            'website' => ['url'],
        ];
        if($request->method() != 'PUT'){
            $validation['email'] = ['email','unique:Companies'];
            }
        return $request->validate($validation);
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($data) {
    //         $data->file = time();
    //         $data->created_by = Auth::user()->id;
    //     });
    // }

    //  public static function create($request){
          
    //      $data = new Companies;
    //     // dd($request);

    //    $data->Name = $request->Name;
    //    $data->email = $request->email;
    // //    $data->logo = $request->logo;
    //    $data->website = $request->website;
    //    $data->save();  
    

    //  }   



}
