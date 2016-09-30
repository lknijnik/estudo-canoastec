<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('attribute_types', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            
            $table->string('name', 255);
            $table->boolean('is_grouping')->nullable();
            $table->timestamps();
        });

        Schema::create('attributes', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('attribute_type_id')->unsigned();
            $table->foreign('attribute_type_id')->references('id')->on('attribute_types');
            $table->string('name', 255);
            $table->enum('identifyer_type', ['none', 'color', 'image', 'text', 'colorname'])->nullable();
            $table->string('identifyer', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('products_attributes', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('attribute_id')->unsigned();
            $table->foreign('attribute_id')->references('id')->on('attributes');

            $table->primary(['product_id', 'attribute_id'], 'pk_product_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_attributes');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('attribute_types');
    }

}
