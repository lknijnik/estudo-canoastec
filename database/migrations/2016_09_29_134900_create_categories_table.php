<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name', 255);
            $table->string('url', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('subcategories', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name', 255);
            $table->string('url', 255)->nullable();
            $table->timestamps();
        });


        Schema::create('products_to_categories', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

            $table->primary(['product_id', 'category_id', 'subcategory_id'], 'pk_product_subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_to_categories');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('categories');
    }
}
