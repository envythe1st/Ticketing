<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('m_ticket', function (Blueprint $table) {
            $table->id();
            $table->string('group_name', 255);
            $table->unsignedBigInteger('category_id');
            $table->string('status', 50)->default('Pending');
            $table->text('details');
            $table->unsignedBigInteger('handled_by')->nullable();
            $table->string('sender', 200);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('m_category')->onDelete('cascade');
            $table->foreign('handled_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('m_ticket');
    }
};
