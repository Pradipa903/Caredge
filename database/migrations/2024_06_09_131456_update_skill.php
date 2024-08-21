<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_selections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('skills'); // Text type to store comma-separated values
            $table->text('majors'); // Text type to store comma-separated values
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_selections');
    }
};
