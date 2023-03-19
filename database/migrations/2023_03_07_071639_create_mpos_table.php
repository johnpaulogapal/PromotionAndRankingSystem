<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpos', function (Blueprint $table) {
            $table->id()->from('106000001');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('org_name');
            $table->date('validity');
            $table->string('certificate')->nullable();
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
        Schema::dropIfExists('mpos');
    }
}
