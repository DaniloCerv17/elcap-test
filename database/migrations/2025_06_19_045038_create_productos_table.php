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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
             $table->string('nombre', 50);
             $table->decimal('precio', 8,2);
             $table->string('descripcion',100)->nullable();
             $table->string('imagen')->nullable();
             $table->string('slug', 80)->unique();
            $table->foreignId('id_sub_categoria')->nullable()->constrained('sub_categorias')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
