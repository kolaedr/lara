<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentController extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 225);
            $table->text('comment');
            $table
                ->unsignedBigInteger('news_id')
                ->nullable();
            $table->foreign('news_id')
                ->references('id')->on('news')
                ->onDelete('SET NULL');
            $table
                ->unsignedBigInteger('comment_id')
                ->nullable();
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
        //
    }
}
