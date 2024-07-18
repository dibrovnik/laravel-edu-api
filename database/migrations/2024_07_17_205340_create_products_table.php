<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullOnDelete();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('name')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('count')->nullable();
            $table->integer('price')->nullable();
            $table->float('status')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
