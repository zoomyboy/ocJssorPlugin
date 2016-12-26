<?php namespace Zoomyboy\Jssor\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateJssorsTable extends Migration
{
    public function up()
    {
        Schema::create('zoomyboy_jssor_jssors', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
			$table->string('title');
			$table->integer('autoplay')->unsigned();
			$table->integer('arrow_id')->unsinged();
			$table->integer('bullet_id')->unsinged();
			$table->integer('fill_mode')->unsigned();
			$table->integer('slide_duration')->unsigned();
			$table->integer('interval')->unsigned();
			$table->integer('pause')->unsigned();
			$table->integer('use_pause_from_component')->unsigned();
			$table->integer('height');
			$table->integer('use_height_from_component')->unsigned();
			$table->string('backgroundcolor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zoomyboy_jssor_jssors');
    }
}
