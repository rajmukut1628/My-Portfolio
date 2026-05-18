<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_messages', 'is_hidden')) {
                $table->boolean('is_hidden')->default(false)->after('is_read');
            }

            if (!Schema::hasColumn('contact_messages', 'hidden_at')) {
                $table->timestamp('hidden_at')->nullable()->after('is_hidden');
            }
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            if (Schema::hasColumn('contact_messages', 'hidden_at')) {
                $table->dropColumn('hidden_at');
            }

            if (Schema::hasColumn('contact_messages', 'is_hidden')) {
                $table->dropColumn('is_hidden');
            }
        });
    }
};