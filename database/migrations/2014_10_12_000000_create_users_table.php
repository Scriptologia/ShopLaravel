<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->nullable()->default(3) ->constrained('roles')->onDelete('set null');
            $table->string('name');
            $table->string('surname');
            $table->string('country');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->boolean('status')->default(1);
            $table->json('shipping_info')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
//        User::create(['name' => 'admin','email' => 'admin@themesbrand.com','password' => Hash::make('123456'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'avatar-1.jpg','created_at' => now(),]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
