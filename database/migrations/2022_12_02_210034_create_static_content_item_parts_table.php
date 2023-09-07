<?php

use App\Enums\StaticContentTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaticContentItemPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_content_item_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_item_id')->references('id')->on('static_content_items')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->enum('type', StaticContentTypes::getValues());
            $table->json('options')->nullable();
            $table->integer('order')->nullable();
            $table->json('value')->nullable();
            $table->foreignId('structure_part_id')->references('id')->on('structure_parts')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('static_content_item_parts');
    }
}
