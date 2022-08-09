<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('service')->nullable();
            $table->string('description')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('car_category')->nullable();
            $table->string('guide')->nullable();
            $table->string('carseat')->nullable();
            $table->string('order_amount')->nullable();
            $table->string('status')->nullable();
            $table->string('company_id')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('adults')->nullable();
            $table->string('children')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('transfers');
    }
}
