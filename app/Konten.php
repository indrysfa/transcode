<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $guarded = [];

    public function m_konten()
    {
        return $this->belongsTo(Jeniskonten::class, 'jenis_konten_id', 'id');
    }
}
