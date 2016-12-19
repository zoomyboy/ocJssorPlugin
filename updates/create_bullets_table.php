<?php namespace Zoomyboy\Jssor\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBulletsTable extends Migration
{
    public function up()
    {
        Schema::create('zoomyboy_jssor_bullets', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
			$table->string('filename');
			$table->string('cssLeft');
			$table->string('cssRight');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zoomyboy_jssor_bullets');
    }
}
