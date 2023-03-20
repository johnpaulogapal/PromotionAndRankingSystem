<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('edu_attain')->nullable();
            $table->integer('teach_eval')->nullable();
            $table->integer('research')->nullable();
            $table->integer('com_ser')->nullable();
            $table->integer('train_sem')->nullable();
            $table->integer('mpo')->nullable();
            $table->integer('prof_exam')->nullable();
            $table->integer('masters')->nullable();
            $table->integer('teach_eval_min')->nullable();
            $table->integer('research_min')->nullable();
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
        Schema::dropIfExists('scores');
    }
}
