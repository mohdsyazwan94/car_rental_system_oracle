<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('reservations', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('customer_id')->constrained('users');
        //     $table->foreignId('staff_id')->nullable()->constrained('users');
        //     $table->foreignId('room_id')->constrained('rooms');
        //     $table->date('check_in');
        //     $table->date('check_out');
        //     $table->foreignId('reservation_status_id')->constrained('reservation_statuses');
        //     $table->string('reservation_type', 30);
        //     $table->string('cancel_reason', 255)->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
