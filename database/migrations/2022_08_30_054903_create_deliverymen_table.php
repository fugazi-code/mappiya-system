<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverymen', function (Blueprint $table) {
            $table->id();
            $table->string('phone_no');
            $table->text('address');
            $table->string('plate_no');
            $table->integer('vehicle_id');
            $table->text('profile_image');
            $table->integer('is_blocked')->default(0);
            $table->integer('is_active')->default(0);
            $table->integer('is_online')->default(0);
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliverymen');
    }
};
