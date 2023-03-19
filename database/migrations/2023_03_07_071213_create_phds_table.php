<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phds', function (Blueprint $table) {
            $table->id()->from('104000001');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('school');
            $table->string('course');
            $table->date('graduation_date');
            $table->string('diploma')->nullable();
            $table->string('research')->nullable();
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
        Schema::dropIfExists('phds');
    }
}
