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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name', 255);
            $table->json('tags')->nullable();
            $table->string('alias', 255);
            $table->string('ip', 255);
            $table->string('port')->nullable()->default(80);
            $table->string('username', 255);
            $table->string('pswd')->nullable()->default('');
            $table->text('key')->nullable();
            $table->string('status');
            $table->string('type')->nullable();
            $table->string('directory')->nullable()->default('/var/www');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
