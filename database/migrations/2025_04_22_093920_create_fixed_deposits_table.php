<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fixed_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bank');
            $table->float('amount');
            $table->date('start_date');
            $table->date('maturity_date');
            $table->float('interest_rate');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('fixed_deposits');
    }
};
