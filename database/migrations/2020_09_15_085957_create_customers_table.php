<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->string('surname', 32);
            $table->string('phone', 24);
            $table->string('email', 64);
            $table->text('comment');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('customers', function (Blueprint $table) {
            $table->dropUnique(['company_id']);
            $table->dropForeign(['company_id']);
        });
    }
}