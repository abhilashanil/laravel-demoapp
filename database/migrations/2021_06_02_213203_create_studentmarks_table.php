<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmarks', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->id();
            $table->integer('maths');
            $table->integer('science');            
            $table->integer('history');
            $table->string('term');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('status');
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
        Schema::dropIfExists('studentmarks');
    }
}
