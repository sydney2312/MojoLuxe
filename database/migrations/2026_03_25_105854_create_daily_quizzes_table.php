<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('daily_quiz', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('option_a', 100);
            $table->string('option_b', 100);
            $table->string('option_c', 100);
            $table->string('option_d', 100);
            $table->string('correct_answer', 1); // a, b, c, or d
            $table->date('date_active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_quiz');
    }
};
