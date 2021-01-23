<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apj extends Model
{
    protected $guarded = [];

    public function m_status()
    {
        return $this->belongsTo(Jenisstatus::class, 'jenis_status_id', 'id');
    }
}
