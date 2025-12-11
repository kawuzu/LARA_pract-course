<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Заголовок баннера
            $table->text('subtitle')->nullable();  // Текст под заголовком
            $table->string('image')->nullable();   // Путь к изображению
            $table->string('link');           // Куда ведёт баннер
            $table->enum('type', ['full_bg','split_bg','lost','event'])->default('full_bg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
