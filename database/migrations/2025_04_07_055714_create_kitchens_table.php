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
        Schema::create('kitchens', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('kitchen_name');
            $table->string('email');
            $table->integer('sqft');
            $table->bigInteger('contact_no');
            $table->string('status')->default('pending');
            $table->string('type')->default('veg');
            $table->string('rating')->default('3');
            $table->text('location');
            $table->text('coordinates')->nullable();
            $table->text('featured_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchens');
    }
};
