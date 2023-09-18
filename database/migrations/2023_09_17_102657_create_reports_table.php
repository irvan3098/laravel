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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string("note")->nullable();
            $table->string("bulan")->nullable();
            $table->string("nama_klient")->nullable();
            $table->date("tgl_awal_payment")->nullable();
            $table->string("durasi_waktu_pre")->nullable();
            $table->date("tgl_start_iklan")->nullable();
            $table->string("nama_bisnis")->nullable();
            $table->string("platform_marketing")->nullable();
            $table->string("closing_from")->nullable();
            $table->string("ttd_mou")->nullable();
            $table->date("tgl_ttdmou")->nullable();
            $table->date("pembayaran")->nullable();
            $table->string("draft_copywriting_lp")->nullable();
            $table->date("tgl_draft_copywriting_lp")->nullable();
            $table->string("pembuatan_sales_funnel")->nullable();
            $table->date("tgl_buat_seles")->nullable();
            $table->string("link_pitching")->nullable();
            $table->string("pembuatan_akun_iklan")->nullable();
            $table->string("review_perform_ads")->nullable();
            $table->date("tgl_review_perform_ads")->nullable();
            $table->date("tgl_review_klient")->nullable();
            $table->string("bahan_content")->nullable();
            $table->string("daily_report")->nullable();
            $table->timestamps();
            $table->integer('users_id');

            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
