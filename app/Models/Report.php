<?php

namespace App\Models;

use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'bulan',
        'nama_klient',
        'tgl_awal_payment',
        'durasi_waktu_pre',
        'tgl_start_iklan', 
        'nama_bisnis',
        'platform_marketing', 
        'closing_from', 
        'ttd_mou', 
        'tgl_ttdmou', 
        'pembayaran', 
        'draft_copywriting_lp', 
        'tgl_draft_copywriting_lp', 
        'pembuatan_sales_funnel', 
        'tgl_buat_seles', 
        'link_pitching', 
        'pembuatan_akun_iklan', 
        'review_perform_ads', 
        'tgl_review_perform_ads', 
        'tgl_review_klient', 
        'bahan_content', 
        'daily_report', 
        'users_id'];
    
    
    public function OrderByUser(): HasMany{
        return $this->hasMany(User::class);
    }

}
