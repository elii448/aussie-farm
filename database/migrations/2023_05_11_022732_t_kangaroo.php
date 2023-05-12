<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('t_kangaroo', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->float('weight');
            $table->float('height');
            $table->enum('gender', ['male', 'female']);
            $table->string('color')->nullable();
            $table->enum('friendliness', ['friendly', 'not friendly'])->nullable();
            $table->date('birthday');
            $table->integer('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('t_kangaroo');
    }
};
