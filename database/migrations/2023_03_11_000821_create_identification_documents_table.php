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
        Schema::create('identification_documents', function (Blueprint $table) {
            $table->id();
            $table->string('id_type');
            $table->string('front_image_path');
            $table->string('back_image_path')->nullable();
            $table->datetime('verified_at')->nullable();
            $table->bigInteger('verified_by')->nullable();
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
        Schema::dropIfExists('identification_documents');
    }
};
