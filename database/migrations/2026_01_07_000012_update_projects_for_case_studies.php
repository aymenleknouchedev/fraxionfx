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
        // Add new rich project fields
        Schema::table('projects', function (Blueprint $table) {
            $table->text('summary')->nullable()->after('description');
            $table->string('video_url')->nullable()->after('summary');
            $table->string('video')->nullable()->after('video_url');
            $table->date('project_date')->nullable()->after('video');
            $table->string('project_duration')->nullable()->after('project_date');
            $table->string('client_name')->nullable()->after('project_duration');
            $table->string('category')->nullable()->after('client_name');
        });

        // Remove deprecated fields in a separate schema operation
        if (Schema::hasColumn('projects', 'url') || Schema::hasColumn('projects', 'pdf')) {
            Schema::table('projects', function (Blueprint $table) {
                if (Schema::hasColumn('projects', 'url')) {
                    $table->dropColumn('url');
                }
                if (Schema::hasColumn('projects', 'pdf')) {
                    $table->dropColumn('pdf');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('url')->nullable()->after('description');
            $table->string('pdf')->nullable()->after('image');

            $table->dropColumn([
                'summary',
                'video_url',
                'video',
                'project_date',
                'project_duration',
                'client_name',
                'category',
            ]);
        });
    }
};
