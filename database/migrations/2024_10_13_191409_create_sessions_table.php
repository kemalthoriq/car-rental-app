<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->text('payload');
            $table->integer('last_activity');
            $table->string('ip_address')->nullable(); // Menambahkan kolom ip_address
            $table->string('user_agent')->nullable(); // Menambahkan kolom user_agent
            $table->foreignId('user_id')->nullable()->constrained(); // Kolom user_id
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
