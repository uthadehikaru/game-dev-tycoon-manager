<?php

use App\Models\Company;
use App\Models\Genre;
use App\Models\Platform;
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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Company::class);
            $table->string('title');
            $table->enum('size',['Small','Medium','Large','AAA']);
            $table->foreignIdFor(Topic::class);
            $table->foreignIdFor(Genre::class);
            $table->enum('audience',['Y','E','M']);
            $table->foreignIdFor(Platform::class);
            $table->unsignedInteger('score');
            $table->string('released_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
