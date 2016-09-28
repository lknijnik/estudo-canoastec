<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255);
            $table->text('short_description')->nullable();
            $table->string('url', 255)->nullable();
            $table->string('sku', 64);
            $table->string('grouping_sku', 64)->nullable();
            $table->string('isbn', 17)->nullable();
            $table->integer('stock')->nullable();
            $table->integer('minimum_stock')->nullable();
            $table->decimal('price', 15,2);
            $table->decimal('discount_price', 15,2)->nullable();
            $table->tinyInteger('discount_percentage')->nullable();
            $table->decimal('weight', 15,2);
            $table->decimal('width', 15,2);
            $table->decimal('length', 15,2);
            $table->decimal('height', 15,2);
            $table->text('description');
            $table->boolean('status');
            $table->smallInteger('views')->nullable();
            $table->date('available_date')->nullable();
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
