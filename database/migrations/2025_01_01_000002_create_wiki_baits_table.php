<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wiki_baits', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('main_target');
            $table->string('bonus_target');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wiki_baits');
    }
};
