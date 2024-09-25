<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoWaToPengumumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('pengumuman', function (Blueprint $table) {
        $table->string('no_wa')->nullable(); // Add nullable if this field is optional
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('pengumuman', function (Blueprint $table) {
        $table->dropColumn('no_wa');
    });
}
}
