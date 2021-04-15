<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TaskTable extends Migration {
    public function up() {
        Schema::create('task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('data');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('task');
    }
}
