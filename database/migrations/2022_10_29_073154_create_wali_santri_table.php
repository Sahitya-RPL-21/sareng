<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliSantriTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('wali_santri', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('santri_id');      
      $table->string('nama_wali');
      $table->string('handphone', 13);
      $table->string('alamat');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('wali_santri');
  }
}
