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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('device_type_id')->constrained('device_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('device_brand_id')->constrained('device_brands')->onUpdate('cascade')->onDelete('cascade');
            $table->string('model');
            $table->mediumText('problems');
            $table->string('includes');
            $table->mediumText('customer_note');
            $table->mediumText('employee_note');
            $table->smallInteger('status')->default('1');
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
        Schema::dropIfExists('devices');
    }
};
