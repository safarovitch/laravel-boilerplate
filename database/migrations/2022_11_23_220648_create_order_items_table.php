<?php

use App\Enums\ProductUnit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained()->nullable();
            $table->string('product_type')->nullable();
            $table->boolean('requires_shipping')->default(true);
            $table->string('name');
            $table->longText('options')->nullable();
            $table->decimal('unit_price', 10, 2)->default(0);
            $table->enum('unit', ProductUnit::getValues())->default(ProductUnit::PIECE);
            $table->decimal('quantity', 10, 2)->default(0);
            $table->decimal('sub_total', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->string('SKU')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('tax_rate');
            $table->decimal('tax_total', 10, 2)->default(0);
            $table->decimal('discount_total', 10, 2)->default(0);
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
        Schema::dropIfExists('order_items');
    }
}
