<?php

use App\Models\MemberCategory;
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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_category_id')->constrained('member_categories', 'id')->cascadeOnDelete();
            // $table->foreignIdFor(MemberCategory::class)->constrained();
            $table->integer('nim');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('major');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
