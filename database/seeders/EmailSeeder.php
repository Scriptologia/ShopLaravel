<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emails = \App\Models\Email::factory(100)->create();
        $users = User::withTrashed()->get();

        foreach($emails as $email) {
            $user_id = $users->random(1)->first()->id;
            $email->update(['user_id' => $user_id]);
        }
    }
}
