<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('number')->nullable();
            $table->enum('country',['nepal','india','maldives']);
            $table->enum('district',['kathmandu','bhaktapur','lalitpur']);
            $table->string('city');
            $table->enum('status',['married','unmarried']);
            $table->date('dob');
            $table->enum('gender',['male','female']);
            $table->text('socialid')->nullable();
            $table->text('social');
            $table->boolean('license')->default(0);
            $table->boolean('vehicle')->default(0);

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
        Schema::dropIfExists('posts');
    }
}
