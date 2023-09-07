<?php

use App\Enums\ProductType;
use App\Enums\Status;
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
            $table->json('title');
            $table->json('slug');
            $table->json('short_desc')->nullable();
            $table->json('desc');
            $table->enum('type', ProductType::getValues());
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('qty')->nullable();
            $table->json('price')->nullable();
            $table->enum('status', Status::getValues());
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
