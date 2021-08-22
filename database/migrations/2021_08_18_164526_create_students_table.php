<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->boolean("pro");
            $table->string("state");
            $table->string("package_name");
            $table->string("lesson");
            $table->integer("daily_time");
            $table->integer("total_time");
            $table->integer("fee");
            $table->integer("paid");
            $table->string("paid_day");
            $table->string("exp_day");
            $table->longText("comment")->nullable();
            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::dropIfExists('students');
    }
}
