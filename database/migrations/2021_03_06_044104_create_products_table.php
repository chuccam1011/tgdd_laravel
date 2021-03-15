<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('catalog_id');
            $table->decimal('price');
            $table->string('brand_id');
            $table->string('operator_id');
            $table->string('camera_after_id');
            $table->string('camera_before_id');
            $table->string('cpu_id');
            $table->string('ram_id');
            $table->string('memory_id');
            $table->string('sim_id');
            $table->string('pin_id');
            $table->string('display_id');
            $table->string('feature');
            $table->string('title');
            $table->string('time-of-launch');
            $table->string('slug');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('rate')->nullable();
            $table->string('description')->nullable();
            $table->string('content')->nullable();
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
        Schema::dropIfExists('products');
    }
}
