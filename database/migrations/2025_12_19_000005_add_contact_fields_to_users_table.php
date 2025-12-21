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
            $table->string('contact_email')->nullable()->after('codepen');
            $table->string('phone1')->nullable()->after('contact_email');
            $table->string('phone2')->nullable()->after('phone1');
            $table->string('telegram')->nullable()->after('phone2');
            $table->string('whatsapp')->nullable()->after('telegram');
            $table->string('skype')->nullable()->after('whatsapp');
            $table->string('discord')->nullable()->after('skype');
            $table->string('viber')->nullable()->after('discord');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'contact_email',
                'phone1',
                'phone2',
                'telegram',
                'whatsapp',
                'skype',
                'discord',
                'viber',
            ]);
        });
    }
};
