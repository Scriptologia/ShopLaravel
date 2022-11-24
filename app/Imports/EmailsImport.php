<?php

namespace App\Imports;

use App\Models\Email;
use Maatwebsite\Excel\Concerns\ToModel;

class EmailsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {;
        return  Email::withTrashed()->updateOrCreate(
            [
                'email' => $row[2]
            ],
            [
            'user_id' => $row[1],
            'subscribed' => $row[3]??1,
            'email_verified_at' => $row[4],
            'created_at' => $row[5],
//            'deleted_at' => $row[7]
        ]);
    }
}
