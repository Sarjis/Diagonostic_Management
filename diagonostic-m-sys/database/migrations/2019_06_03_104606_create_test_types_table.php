<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTypesTable extends Migration
{
    public function up()
    {
        Schema::create('test_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_name',191)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_types');
    }
}
