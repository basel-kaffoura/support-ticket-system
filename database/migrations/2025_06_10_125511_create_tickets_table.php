<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected array $connections = ['technical', 'billing', 'product', 'general', 'feedback'];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->connections as $connection) {
            Schema::connection($connection)->create('tickets', function (Blueprint $table) {
                $table->id();
                // Use a unique ticket_number because the auto increment id may be duplicated across databases
                $table->string('ticket_number')->unique();
                $table->enum('ticket_type', $this->connections);
                $table->string('name');
                $table->string('email');
                $table->string('subject');
                $table->text('description');
                $table->enum('status', ['open', 'noted'])->default('open');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->connections as $connection) {
            Schema::connection($connection)->dropIfExists('tickets');
        }
    }
};
