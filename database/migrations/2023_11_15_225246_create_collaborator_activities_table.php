<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborator_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collaborator_id')->constrained();
            $table->foreignId('period_id')->constrained();
            $table->morphs('activitable'); // Esto creará 'activitable_id' y 'activitable_type'
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
        Schema::dropIfExists('collaborator_activities');
    }
}
