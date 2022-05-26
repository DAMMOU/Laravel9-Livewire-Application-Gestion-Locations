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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('noSerie');
            $table->boolean('estDisponible');
            $table->string('imageUrl');
            $table->timestamps();
            $table->foreignId('type_article_id')->constrained('type_articles');
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
        Schema::table('articles',function(Blueprint $table){
            $table->dropForeign(['type_article_id']);
        });
        Schema::dropIfExists('articles');
    }
};
