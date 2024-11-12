<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trackables', function (Blueprint $table) {
            $table->string('uid', 24)->primary();
            $table->string('name', 255);
            $table->string('user_uid',24)->index();
            $table->timestamps();
        });

        Schema::create('trackable_schemas', function(Blueprint $table) {
            $table->string('uid', 24)->primary();
            $table->string('trackable_uid', 24)->index();
            $table->string('name', 80);
            $table->enum('field_type',['int', 'float', 'json', 'string','bool','date','datetime','enum'])->nullable();
            $table->integer('length')->nullable();
            $table->string('enum_uid', 24);
            $table->string('validation_rule', 255);
            $table->timestamps();
        });

        Schema::create('trackable_data_values', function(Blueprint $table) {
            $table->string('uid', 24)->primary();
            $table->string('trackable_schema_uid')->index();
            $table->mediumText('value');
            $table->timestamps();
        });

        Schema::create('enums', function(Blueprint $table) {
            $table->string('uid', 24)->primary();
            $table->string('name', 255);
            $table->timestamps();
        });

        Schema::create('enum_values', function(Blueprint $table) {
            $table->string('uid', 24)->primary();
            $table->string('enum_uid', 24)->index();
            $table->string('value', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackables');
        Schema::dropIfExists('trackable_schemas');
        Schema::dropIfExists('trackable_data_values');
        Schema::dropIfExists('enums');
        Schema::dropIfExists('enum_values');
    }
};
