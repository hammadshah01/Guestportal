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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string("user_cnic")->nullable();
            $table->string('purpose')->nullable();
            $table->integer('referal_visit_id')->nullable();
            $table->string('referal')->nullable();
            $table->string('department')->nullable();
            $table->string('gueststatus')->default("in");
            $table->datetime("out")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
