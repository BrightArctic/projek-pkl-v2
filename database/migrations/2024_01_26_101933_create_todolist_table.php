<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodolistTable extends Migration
{
    public function up()
    {
        Schema::create('todolist', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Change this line to match the name field
            $table->string('subject'); // Add this line for the subject field
            $table->text('message'); // Add this line for the message field
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('todolist');
    }
}
