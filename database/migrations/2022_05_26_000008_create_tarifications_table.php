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
        Schema::create('tarifications', function (Blueprint $table) {
            $table->id();
            $table->double('prix');
            $table->foreignId('duree_location_id')->constrained('duree_locations');
            $table->foreignId('article_id')->constrained('articles');
            $table->timestamps();

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
        Schema::table('tarifications',function(Blueprint $table){
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['duree_location_id','article_id']);
        });
        Schema::dropIfExists('tarifications');
    }
};
