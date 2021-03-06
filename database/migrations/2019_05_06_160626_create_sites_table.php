<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('server_id');
            $table->unsignedBigInteger('domain_id');
            $table->string('name');
            $table->string('host')->unique();
            $table->timestamps();

            $table->foreign('server_id')
                ->references('id')
                ->on('servers');

            $table->foreign('domain_id')
                ->references('id')
                ->on('domains');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
