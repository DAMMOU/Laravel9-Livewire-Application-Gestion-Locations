<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dateDebut');
            $table->dateTime('dateFin');
            $table->foreignId('statut_location_id')->constrained('statut_locations');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('client_id')->constrained('clients');

        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations',function(Blueprint $table){
            $table->dropForeign(['statut_location_id','user_id','client_id']);
        });
        Schema::dropIfExists('locations');
    }
};
