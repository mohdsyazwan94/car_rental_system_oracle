<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id(['user', 'customer_id']);
            $table->foreignId('user_id')->references('user_id')->on('user');
            $table->string('date_joined');
            $table->string('designation');
            $table->string('salary');
            $table->foreignId('manager_id')->references('user_id')->on('user');
            //$table->foreignId('staff_id')->references('user_id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
