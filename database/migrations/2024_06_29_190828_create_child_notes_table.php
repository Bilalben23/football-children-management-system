<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('child_notes', function (Blueprint $table) {
            $table->id();
            $table->text("note")->nullable(false);
            $table->foreignId("child_id")->constrained("children")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('child_notes');
    }
};