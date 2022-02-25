<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('barcode');
            $table->string('client_name');
            $table->string('idno');
            $table->string('phone');
            $table->string('product_name');
            $table->integer('buying_price');
            $table->integer('selling_price');
            $table->mediumText('photo')->nullable();
            $table->mediumText('photo_one')->nullable();
            $table->mediumText('photo_two')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
