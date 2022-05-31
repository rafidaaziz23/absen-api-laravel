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
        Schema::table('izins', function (Blueprint $table) {
            $table->foreign('murid_id','fk_izin_to_murid')->references('id')->on('murids')
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
        Schema::table('izins', function (Blueprint $table) {
            $table->dropForeign('fk_izin_to_murid');
        });
    }
};
