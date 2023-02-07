<?php
namespace App\Repositories;

use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Hash;

  class UserRespository {

    public function getEmployees(){

        ### use eloquent model to get all record
        return User::all()->sortByDesc('created_at');
    }

    public function getEmployee($empID){

        return User::find($empID);
    }

    public function createEmployees($employeeData)
    {
        $employeePostPayload = array(
            'name' => $employeeData['name'],
            'age' => $employeeData['age'],
            'email' => $employeeData["email"],
            'dob' => Carbon::parse($employeeData['date_of_birth'])->format('Y-m-d'),
            'doj' => Carbon::parse($employeeData['join_of_date'])->format('Y-m-d'),
            'gender' => ( isset($employeeData['gender']) ) ? $employeeData['gender'] : NULL,
            'designation' => ( isset($employeeData['designation']) ) ? $employeeData['designation'] : NULL,
            'password' => Hash::make($employeeData['password']),
            'photo' => ( isset($employeeData['photo_path']) ) ? $employeeData['photo_path'] : NUll,
        );
    //   dd($employeePostPayload);
        return User::create($employeePostPayload);
    }


    public function updateEmployees($employeeData){
        $employeeUpdatePayload = array(
            'name' => $employeeData['name'],
            'age' => $employeeData['age'],
            'email' => $employeeData["email"],
            'dob' => Carbon::parse($employeeData['date_of_birth'])->format('Y-m-d'),
            'doj' => Carbon::parse($employeeData['join_of_date'])->format('Y-m-d'),
            'gender' => ( isset($employeeData['gender']) ) ? $employeeData['gender'] : NULL,
            'designation' => ( isset($employeeData['designation']) ) ? $employeeData['designation'] : NULL,
            'password' => ( isset($employeeData['password']) ) ? Hash::make($employeeData['password']) : NULL,
            'photo' => ( isset($employeeData['photo_path']) ) ? $employeeData['photo_path'] : NUll,
        );
        // dd($employeeUpdatePayload);
        return User::where('id', '=', $employeeData['id'])->update($employeeUpdatePayload);
    }

    ### soft delete  employee
    public function deleteEmployees($employeeId){
        return User::where('id', '=', $employeeId)->delete();
    }

  }
?>