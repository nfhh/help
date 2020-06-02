<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('en-us')->default('');
            $table->string('de-de')->default('');
            $table->string('fr-fr')->default('');
            $table->string('it-it')->default('');
            $table->string('es-es')->default('');
            $table->string('hu-hu')->default('');
            $table->string('ru-ru')->default('');
            $table->string('ko-kr')->default('');
            $table->string('ja-jp')->default('');
            $table->string('zh-cn')->default('');
            $table->string('zh-hk')->default('');
            $table->string('pl-pl')->default('');
            $table->string('tr-tr')->default('');
            $table->unsignedSmallInteger('sort')->default(0);
            $table->unsignedInteger('parent_id')->default(0);
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
        Schema::dropIfExists('subjects');
    }
}
