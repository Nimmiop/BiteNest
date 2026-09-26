<?php

use App\Models\User;
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
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->unique()->constrained()->cascadeOnDelete();
            $table->decimal('balance')->default(0.00);
            $table->string('nid')->unique();
            $table->enum('vehicle', ['cycle', 'bike']);
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('delivery_men');
    }
};
