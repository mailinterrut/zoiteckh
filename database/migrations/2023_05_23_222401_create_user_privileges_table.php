<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
  
class CreateUserPrivilegesTable extends Migration
{
    public function up()
    {
        Schema::create('user_privileges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Add any other columns you require for the user privileges table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_privileges');
    }
}
