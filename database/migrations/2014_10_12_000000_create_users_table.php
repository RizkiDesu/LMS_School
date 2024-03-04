<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->int('class_id')->nullable();

            
            $table->string('name');
            $table->string('last_name',255);

            $table->string('email')->unique();

            $table->string('password');
            $table->rememberToken();

            $table->string('admission_number',255)->nullable();
            $table->string('roll_number',255)->nullable();
            $table->int('class_id',10)->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_bird')->nullable();
            $table->string('caste',50)->nullable();
            $table->string('religion',50)->nullable();
            $table->string('mobile_number',16)->nullable();
            $table->date('admission_date')->nullable();
            $table->string('profile_pic',50)->nullable();
            $table->string('blood_grup',10)->nullable();
            $table->string('height',10)->nullable();
            $table->string('weight',10)->nullable(); 


            $table->string('occupation',255)->nullable();
            $table->string('address',255)->nullable(); 
            

            $table->tinyInteger('user_type')->nullable(); //1: admin, 2: teacher, 3: studen, 4: parent
            $table->tinyInteger('is_delete')->default(0); //0: not delete, 1:delete
            $table->tinyInteger('status')->default(0); //0: active, 1: inactive

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
