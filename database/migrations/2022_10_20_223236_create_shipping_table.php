<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Countries and cities
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->foreignId('parent_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('zip');
            $table->timestamps();
        });

        // Methods - free, flat rate etc
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description')->nullable();
            $table->json('settings')->nullable();
            $table->timestamps();
        });

        // Supported Zones
        Schema::create('shipping_zones', function (Blueprint $table) {
            $table->id();
            $table->string('zone_name')->unique();
            $table->bigInteger('zone_order')->default(0);
            $table->timestamps();
        });

        // Supported locations within the zone
        Schema::create('shipping_zone_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('shipping_zone_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('shipping_zones')->onUpdate('cascade')->onDelete('cascade');
            $table->string('location_code');
            $table->string('location_type');
            $table->string('location_name');
            $table->timestamps();
        });

        // Supported methods within the zone locations
        Schema::create('shipping_zone_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('shipping_zones');
            $table->unsignedBigInteger('location_id')->nullable();;
            $table->foreign('location_id')->references('id')->on('shipping_zone_locations');
            $table->string('method_name');
            $table->string('method_type');
            $table->bigInteger('method_value');
            $table->bigInteger('method_order')->default(0);
            $table->tinyInteger('is_enabled')->default(1);
            $table->timestamps();
        });

        Schema::create('shipping_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('shipping_class_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('shipping_zones');
    }
}
