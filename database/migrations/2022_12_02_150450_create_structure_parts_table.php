<?php

use App\Enums\StaticContentTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructurePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('structure_id')->references('id')->on('static_content_structures')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->enum('type', StaticContentTypes::getValues());
            $table->json('options')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('structure_parts');
    }
}
