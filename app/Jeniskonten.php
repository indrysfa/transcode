<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeniskonten extends Model
{
    public function m_jeniskonten()
    {
        return $this->hasMany(Jeniskonten::class, 'jenis_konten_id', 'id');
    }
}
