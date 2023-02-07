<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new User([
            'name'     => $row['name'],
            'age'    => $row['age'],
            'dob'=>  Carbon::parse($row['date_of_birth'])->format('Y-m-d'),
            'doj'=>  Carbon::parse($row['date_of_joining'])->format('Y-m-d'),
            'gender'=> $row['gender'],
            'designation'=> $row['designation'],
            'email'=> $row['email'],
            'password' => Hash::make($row['password'],)
        ]);
    }
}