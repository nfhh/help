<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('path')->default('');
            $table->string('name')->default('');
            $table->string('suffix')->default('');
            $table->unsignedBigInteger('size')->default(0);
            $table->unsignedInteger('shard_index')->default(0);
            $table->unsignedBigInteger('shard_size')->default(0);
            $table->unsignedInteger('shard_total')->default(0);
            $table->string('key')->default('');
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
        Schema::dropIfExists('assets');
    }
}
