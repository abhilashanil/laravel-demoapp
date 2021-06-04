<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('status');
            $table->timestamps();
        });

        $now = date('Y-m-d H:i:s');

        DB::table('teachers')->insert(
            array(
                array(
                    'name' => 'Mark',
                    'department' => 'English',
                    'status' => 'active',
                    'created_at' => $now,
                    'updated_at' => $now                  
                ),
                array(
                    'name' => 'John',
                    'department' => 'Maths',
                    'status' => 'active',
                    'created_at' => $now,
                    'updated_at' => $now  
                ),
                array(
                    'name' => 'Anthony',
                    'department' => 'Physics',
                    'status' => 'active',
                    'created_at' => $now,
                    'updated_at' => $now  
                ),
                array(
                    'name' => 'Peter',
                    'department' => 'Chemistry',
                    'status' => 'active',
                    'created_at' => $now,
                    'updated_at' => $now  
                ),
                array(
                    'name' => 'James',
                    'department' => 'Computers',
                    'status' => 'active',
                    'created_at' => $now,
                    'updated_at' => $now  
                ),
                array(
                    'name' => 'Lukas',
                    'department' => 'English',
                    'status' => 'deleted',
                    'created_at' => $now,
                    'updated_at' => $now  
                )
            )
        );        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
