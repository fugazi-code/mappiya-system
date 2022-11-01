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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->unique();
            $table->string('dispatch_lat');
            $table->string('dispatch_long');
            $table->foreignId('deliveryman_id')->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('customer_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('status');
            $table->string('payment_no')->nullable();
            $table->decimal('distance_km')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
