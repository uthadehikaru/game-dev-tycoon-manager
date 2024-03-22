<?php

use App\Models\Platform;
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
        Schema::create('platform_audiences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Platform::class);
            $table->enum('audience',['Y','E','M']);
            $table->unsignedInteger('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platform_audiences');
    }
};
