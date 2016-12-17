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
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zoomyboy_jssor_jssors');
    }
}
