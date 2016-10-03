<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            
            $table->text('name', 255);
            $table->text('nickname', 100)->nullable();
            $table->text('cpf', 15)->nullable();
            $table->text('rg', 20)->nullable();
            $table->text('password', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->text('phone', 20)->nullable();
            $table->text('mobile', 20)->nullable();
            $table->timestamps();
        });

        Schema::table('reviews', function ($table) {

            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function ($table) {
            $table->dropForeign('reviews_customer_id_foreign');
            $table->dropColumn('customer_id');
        });

        Schema::dropIfExists('customers');
    }
}
