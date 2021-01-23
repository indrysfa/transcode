<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisstatus extends Model
{
    public function m_jenisstatus()
    {
        return $this->hasMany(Jenisstatus::class, 'jenis_status_id', 'id');
    }
}
