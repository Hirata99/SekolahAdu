<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'judul', 'deskripsi', 'lokasi', 'foto', 'status', 'tanggapan_admin'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
