<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->text('address_type', 50);
            $table->text('address', 255);
            $table->text('number', 10);
            $table->text('complement', 20)->nullable();
            $table->text('district', 50);
            $table->char('cep', 9);
            $table->char('state', 2);
            $table->text('city', 100);
            $table->text('reference', 100)->nullable();
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
        Schema::dropIfExists('customer_addresses');
    }
}
