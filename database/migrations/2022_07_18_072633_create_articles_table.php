<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100 )->index();
            $table->string('slug')->index();
            $table->string('summary', 255 )->nullable();   // For type => services
            $table->text('content', 5000);
            $table->string('author')->nullable();          // For type => blog
            $table->string('category')->nullable();        // For type => blog
            $table->integer('parent_id')->nullable();      // For type => services , sub_services
            $table->string('type' , 55 )->default('blog'); // Type => ( blog , services , tax_center )
            $table->string('icon')->nullable();            // For type => services
            $table->string('img');
            $table->string('seo_title', 500);
            $table->string('seo_description', 500);
            $table->string('seo_keywords', 500);
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
        Schema::dropIfExists('articles');
    }
};
