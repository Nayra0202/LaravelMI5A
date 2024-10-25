<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Prodi extends Model
{
    use HasFactory, HasUuids;

    protected $table = "prodi";
    protected $fillable = ['nama','kaprodi','singkatan','fakultas_id'];

    public function fakultas(){
        return $this->belongsTo(fakultas::class, 'fakultas_id','id');
    }
}
