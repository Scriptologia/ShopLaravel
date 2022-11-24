<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return  User::withTrashed()->updateOrCreate(
            [
                'email' => $row[6]
            ],
            [
            'role_id' => $row[1],
            'name' => $row[2],
            'surname' => $row[3],
            'country' => $row[4],
            'phone' => $row[5],
            'password' => Hash::make('123456'),
            'avatar' => $row[7],
            'status' => $row[8],
            'shipping_info' => $row[9],
            'email_verified_at' => $row[10],
            'created_at' => $row[11]
        ]);
    }
}
