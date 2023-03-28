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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->unsignedBigInteger('role_id')->nullable()->comment('null-CUSTOMER/1-SUPERADMIN/2-ADMIN');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->timestamp('validid_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('users');
    }
};
