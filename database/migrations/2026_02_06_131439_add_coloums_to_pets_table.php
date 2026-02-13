<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // owner of the pet
            $table->string('name');               // pet's name
            $table->string('type');               // Dog, Cat, etc.
            $table->string('breed');              // breed of the pet
            $table->integer('age');               // age of the pet
            $table->string('personality')->nullable(); // optional personality description
            $table->string('avatar')->nullable(); // optional image filename or URL
            $table->timestamps();                 // created_at & updated_at

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pets');
    }
};
