<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();

            $table->nullableMorphs('author'); // User who triggered the event
            $table->string('title')->comment("Title of the event");
            $table->string('description')->nullable()->comment("Description of the event");
            $table->nullableMorphs('auditable'); // Model that was changed
            $table->json('old_values')->nullable()->comment("Old values of the model");
            $table->json('new_values')->nullable()->comment("New values of the model");
            $table->json('author_additional_data')->nullable()->comment("Additional data from the user who triggered the event e.g. IP address");


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audit_trails');
    }
};
