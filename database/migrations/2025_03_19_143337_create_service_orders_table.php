<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('pivot_model');
            $table->date('service_date');
            $table->string('status')->default('scheduled');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_orders');
    }
}
