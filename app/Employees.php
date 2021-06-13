<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'First_name','Last_name','Company','email','phone'
    ];
    static function validateFields($request)
    {
        $validation = [
            'First_name' => ['required'],
            'Last_name' => ['required'],
            'Company' => ['numeric'],
            'email' => ['email','unique:Employees'],
            'phone' => ['digits:10'],
        ];
     if($request->method() != 'PUT'){
     $validation['email'] = ['email','unique:Employees'];
     }
        return $request->validate($validation);
    }
}
