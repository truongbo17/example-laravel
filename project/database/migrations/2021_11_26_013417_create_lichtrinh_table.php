<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichtrinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichtrinh', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name', 50);
            $table->string('class_name', 50);
            $table->string('teacher_name', 50);
            $table->tinyInteger('farmetime'); //0->2,4,6 ; 1->3,5,7
            $table->float('starttime', 8, 2); //13h30 -> 13.5
            $table->float('endtime', 8, 2); //17h30 -> 17.5
            $table->date('startdate');
            $table->date('enddate');
            $table->string('note', 50);
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
        Schema::dropIfExists('lichtrinh');
    }
}
