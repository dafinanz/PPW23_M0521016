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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->string('species');
            $table->string('disease');
            $table->date('appointment');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
