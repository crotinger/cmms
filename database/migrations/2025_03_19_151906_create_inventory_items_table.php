<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryItemsTable extends Migration
{
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('part_number');
            $table->string('description');
            $table->integer('quantity')->default(0);
            $table->decimal('unit_cost', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventory_items');
    }
}
