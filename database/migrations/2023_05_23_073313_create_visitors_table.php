<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string("role")->nullable();
            $table->string("name")->nullable();
            $table->string("referal")->nullable();
            $table->integer("referal_visit_id")->nullable();
            $table->string("fathername")->nullable();
            $table->string("cnic")->nullable();
            $table->integer("yearofadmission")->nullable();
            $table->integer("yearofgraduation")->nullable();
            $table->integer("purpose")->nullable();
            $table->integer("department")->nullable();
            $table->string("status")->nullable();
            $table->string("image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
