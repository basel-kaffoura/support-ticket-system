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
            Schema::connection($connection)->table('tickets', function (Blueprint $table) {
                $table->text('admin_note')->nullable()->after('status');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->connections as $connection) {
            Schema::connection($connection)->table('tickets', function (Blueprint $table) {
                $table->dropColumn('admin_note');
            });
        }
    }
};
