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
        Schema::table('users', function (Blueprint $table) {
            $table->string('github')->nullable()->after('photo');
            $table->string('linkedin')->nullable()->after('github');
            $table->string('twitter')->nullable()->after('linkedin');
            $table->string('instagram')->nullable()->after('twitter');
            $table->string('facebook')->nullable()->after('instagram');
            $table->string('youtube')->nullable()->after('facebook');
            $table->string('portfolio')->nullable()->after('youtube');
            $table->string('behance')->nullable()->after('portfolio');
            $table->string('dribbble')->nullable()->after('behance');
            $table->string('codepen')->nullable()->after('dribbble');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'github',
                'linkedin',
                'twitter',
                'instagram',
                'facebook',
                'youtube',
                'portfolio',
                'behance',
                'dribbble',
                'codepen',
            ]);
        });
    }
};
