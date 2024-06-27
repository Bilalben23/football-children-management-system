<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string("first_name", 60);
            $table->string("last_name", 60);
            $table->date("birth_date");
            $table->string("image_url", 100);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};