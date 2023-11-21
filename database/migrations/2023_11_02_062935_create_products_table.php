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
        Schema::create('amz_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('product_title');    
            $table->string('product_name');
            $table->text('product_image');
            $table->text('product_description');
            $table->string('product_price');
            $table->string('product_priceoriginal');
            $table->string('product_qty');
            $table->boolean('product_status')->default(0);
            $table->timestamps();

          $table->foreign('category_id')->references('id')->on('amz_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amz_products');
    }
}
