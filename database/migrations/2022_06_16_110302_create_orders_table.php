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
            $table->increments('id');
            $table->double('paid_amount');
            $table->string('intent_id');
            $table->enum('status', ['paid', 'cancelled', 'refunded', 'failed']);
            $table->longText('receipt_url');
            $table->unsignedInteger('user_id');
            $table->enum('delivery_status', ['assigned','pending','completed'])->default('pending');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
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
