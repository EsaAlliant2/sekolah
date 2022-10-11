<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Mapel;

class siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    protected $guarded = [];

    public function mapel(){
        return $this->belongsto(mapel::class);      
    }

    public function Kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
