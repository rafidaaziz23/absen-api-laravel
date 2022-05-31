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
        Schema::table('murids', function (Blueprint $table) {
            $table->foreign('nis_id','fk_nis_to_murids')->references('id')->on('nis')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('murids', function (Blueprint $table) {
            $table->dropForeign('fk_nis_to_murids');
        });
    }
};
