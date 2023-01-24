<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    public static function getDataMapel()
    {
        $mapel = mapel::all();

        $mapel_filter = [];

        $no = 1;
        for ($i = 0; $i < $mapel->count(); $i++) {
            $mapel_filter[$i]['no'] = $no++;
            $mapel_filter[$i]['mapel'] = $mapel[$i]->mapel;
            $mapel_filter[$i]['semester'] = $mapel[$i]->semester;
            $mapel_filter[$i]['id_jurusan'] = $mapel[$i]->jurusan_id;
        }

        return $mapel_filter;
    }
    public function jurusans()
    {
        return $this->belongsTo(jurusan::class, 'jurusan_id')
                        ->withDefault(['jurusan' => 'jurusan belum dipilih']);
    }
}
