<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_type_id')->constrained('training_types'); // Assuming the training_type table is named 'training_types'
            $table->foreignId('activity_id')->constrained();
            $table->string('institution_name');
            $table->integer('semester_hours');
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
        Schema::dropIfExists('technical_trainings');
    }
}
