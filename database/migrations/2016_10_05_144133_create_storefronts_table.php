<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorefrontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storefronts', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->text('title', 255);
            $table->tinyInteger('max_products')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->enum('storefront_type', ['manual', 'automatic']);
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('subcategory_id')->unsigned()->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->boolean('discount');
            $table->timestamps();
        });

        Schema::create('products_to_storefronts', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('storefront_id')->unsigned();
            $table->foreign('storefront_id')->references('id')->on('storefronts')->onDelete('cascade');

            $table->primary(['product_id', 'storefront_id'], 'pk_product_storefronts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_to_storefronts');
        Schema::dropIfExists('storefronts');
    }
}
