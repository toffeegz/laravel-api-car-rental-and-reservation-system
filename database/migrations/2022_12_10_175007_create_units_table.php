<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('model');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('unit_classification_id');
            $table->unsignedBigInteger('created_by');
            $table->string('photo_path');
            $table->double('range_from');
            $table->double('range_to');
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
        Schema::dropIfExists('units');
    }
};
