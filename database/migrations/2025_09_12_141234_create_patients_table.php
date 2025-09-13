<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("DROP TYPE IF EXISTS gender_enum");

        DB::statement("CREATE TYPE gender_enum AS ENUM ('L','P')");

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('nik', 20);
            $table->enum('gender', ['L', 'P']);
            $table->date('birth_date');
            $table->string('phone', 15);
            $table->text('address');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
        DB::statement("DROP TYPE gender_enum");

    }
};
