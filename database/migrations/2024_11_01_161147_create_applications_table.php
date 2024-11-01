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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->text('email');
            $table->date('applied_at')->useCurrent();
            $table->date('interview_at')->nullable();
            $table->string('sop')->nullable();
            $table->string('motivation_letter')->nullable();
            $table->string('cv')->nullable();
            $table->string('tr_bachelor')->nullable();
            $table->string('tr_master')->nullable();
            $table->string('tr_phd')->nullable();
            $table->string('crt_bachelor')->nullable();
            $table->string('crt_master')->nullable();
            $table->string('crt_phd')->nullable();
            $table->string('custom_form')->nullable();
            $table->string('refrence_letter')->nullable();
            $table->text('additional_info')->nullable();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('position_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
