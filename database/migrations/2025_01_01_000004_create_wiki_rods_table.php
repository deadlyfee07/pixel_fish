<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wiki_rods', function (Blueprint $table) {
            $table->id();
            $table->string('rod_name');
            $table->string('upgrade_level');
            $table->text('requirements');
            $table->integer('gem_cost');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wiki_rods');
    }
};
