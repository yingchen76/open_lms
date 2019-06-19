<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('kelas_id')->nullable();
            $table->String('nama_tugas')->nullable();
            $table->String('deskripsi')->nullable();
            $table->String('file_tugas')->nullable();
            $table->date('deadline')->nullable();
            $table->timestamps();
        });
        DB::table('tugas')->insert([
                'id' => '1',
                
            ]);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
