<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPeopleTable extends Migration
{
    public function up()
    {
        Schema::create('category_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_encuestador');
            $table->integer('hombre');
            $table->integer('ninia');
            $table->integer('mujer');
            $table->integer('anciano');
            $table->string('calle_relevamiento');
            $table->string('calle_lateral_a');
            $table->string('calle_lateral_b');
            $table->string('temperatura');
            $table->string('condiciones');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->string('fecha');
            $table->string('nota')->nullable();
            $table->string('fijoc')->nullable();
            $table->string('fijon')->nullable();
            $table->string('ambulantec')->nullable();
            $table->string('ambulanten')->nullable();
            $table->string('indigenah')->nullable();
            $table->string('indigenam')->nullable();
            $table->text('imageMapeo')->nullable();
            $table->text('imageAcera')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('category_people');
    }
}
