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
            $table->integer('brand_id');
            $table->integer('operator_id');
            $table->integer('camera_after_id');
            $table->integer('camera_before_id');
            $table->integer('cpu_id');
            $table->integer('ram_id');
            $table->integer('memory_id');
            $table->integer('sim_id');
            $table->integer('pin_id');
            $table->integer('display_id');
            $table->integer('feature');
            $table->integer('title');
            $table->date('time_of_launch');
            $table->string('slug');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('rate')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();
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
