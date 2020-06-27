<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('title', 100)->unique();
            $table->longText('body');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussions');
    }
}
