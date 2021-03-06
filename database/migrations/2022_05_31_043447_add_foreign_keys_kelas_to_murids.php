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
            $table->foreign('kelas_id','fk_kelas_to_murids')->references('id')->on('kelas')
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
            $table->dropForeign('fk_kelas_to_murids');
        });
    }
};
