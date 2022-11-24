<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = \App\Models\Role::factory(3)->create();
         $permissions = \App\Models\Permission::factory(28)->create();
        \App\Models\User::create([
            'role_id' => 1,
            'status' => 1,
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$6xHHyNn70uDLsiCaN9HeqeEuG0TKTR.ujZO3MOhTRQ6kZPbheZ.CS',
        ]);
        $users = \App\Models\User::factory(100)->create();
        $emails = \App\Models\Email::factory(100)->create();
         \App\Models\Category::factory(10)->create();
         $tags = \App\Models\Tag::factory(20)->create();
        $products = \App\Models\Product::factory(100)->create();
        $orders = \App\Models\Order::factory(100)->create();

        foreach($roles as $role) {
            $permissionsIds = $permissions->random(20)->pluck('id');
            $role->permissions()->attach($permissionsIds);
        }

        foreach($users as $user) {
            $role_id = $roles->random(1)->first()->id;
            $user->update(['role_id' => $role_id]);
        }

        foreach($emails as $email) {
            $user_id = $users->random(1)->first()->id;
            $email->update(['user_id' => $user_id]);
        }

         foreach($products as $product) {
             $tagsId = $tags->random(3)->pluck('id');
             $product->tags()->attach($tagsId);
         }

         foreach($orders as $order) {
             $productsId = $products->random(3)->pluck('id');
             $order->products()->attach($productsId, ['quantity' => rand(1, 5)] );
         }
    }
}
