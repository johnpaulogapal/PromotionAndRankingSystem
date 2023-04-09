<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prcs', function (Blueprint $table) {
            $table->id()->from('105000001');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('prc_num');
            $table->date('validity');
            $table->string('prc_front')->nullable();
            $table->string('prc_back')->nullable();
            $table->string('prc_certificate')->nullable();
            $table->string('status');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prcs');
    }
}
