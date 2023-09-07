<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variation_option_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variation_id')->references('id')->on('product_variations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('sku')->nullable();
            $table->string('ean')->nullable();
            $table->json('price', 8, 2)->nullable();
            $table->json('discount_price', 8, 2)->nullable();
            $table->integer('length')->default(0)->nullable();
            $table->integer('height')->default(0)->nullable();
            $table->integer('width')->default(0)->nullable();
            $table->integer('weight')->default(0)->nullable();
            $table->integer('stock')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variation_option_values');
    }
}
