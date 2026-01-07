<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (! Schema::hasColumn('projects', 'model_embed')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->text('model_embed')->nullable()->after('model_file');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('projects', 'model_embed')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('model_embed');
            });
        }
    }
};
