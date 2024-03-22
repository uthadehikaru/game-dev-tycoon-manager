<?php

use App\Models\Topic;
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
        Schema::create('topic_audiences', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Topic::class);
            $table->enum('audience',['Y','E','M']);
            $table->unsignedInteger('score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_audiences');
    }
};
