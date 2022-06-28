<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(){
        Schema::create('participants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name','150');
            $table->string('place_of_birth','150');
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->comment("-1,0,1")->default('-1');
            $table->string('Email',250)->nullable();
            $table->string('Hp',18)->nullable();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(){
        Schema::dropIfExists('participants');
    }
};
