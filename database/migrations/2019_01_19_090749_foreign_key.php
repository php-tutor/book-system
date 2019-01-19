<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('mobile_phones', function (Blueprint $table) {
        $table->integer('manufacturer_id')
          ->unsigned()->nullable()->default(NULL);
        Schema::disableForeignKeyConstraints();
        $table->foreign('manufacturer_id')
          ->references('id')->on('manufacturers')
          ->onDelete('cascade');;
        Schema::enableForeignKeyConstraints();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('mobile_phones', function (Blueprint $table) {
        $table->dropForeign('mobile_phones_manufacturer_id_foreign');
        $table->dropColumn('manufacturer_id');
      });

    }
}
