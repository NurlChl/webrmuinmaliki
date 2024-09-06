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
        Schema::create('aspirations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained('faculties', 'id')->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('aspiration_types', 'id')->cascadeOnDelete();
            $table->string('name');
            $table->integer('nim');
            $table->string('address');
            $table->integer('telephone');
            $table->integer('generation');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirations');
    }
};
