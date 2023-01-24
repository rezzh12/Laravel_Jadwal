<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id_guru'];
    protected $primaryKey = 'id_guru';
    protected $fillable = ['id_guru','id_waktu','id_kelas','id_mapel'];
    public static function getDataMapel()
    {
        $jadwal = jadwal::all();

        $jadwal_filter = [];

        $no = 1;
        for ($i = 0; $i < $jadwal->count(); $i++) {
            $jadwal_filter[$i]['no'] = $no++;
            $jadwal_filter[$i]['id_guru'] = $jadwal[$i]->id_guru;
            $jadwal_filter[$i]['id_waktu'] = $jadwal[$i]->id_waktu;
            $jadwal_filter[$i]['id_kelas'] = $jadwal[$i]->id_kelas;
            $jadwal_filter[$i]['id_mapel'] = $jadwal[$i]->id_mapel;
        }

        return $jadwal_filter;
    }
    public function jadwals()
    {
        return $this->belongsTo(guru::class, 'guru_id')
                        ->withDefault(['guru' => 'guru belum dipilih']);
    }
    public function jadwal1()
    {
        return $this->belongsTo(waktu::class, 'waktu_id')
                        ->withDefault(['waktu' => 'guru belum dipilih']);
    }
    public function jadwal2()
    {
        return $this->belongsTo(kelas::class, 'kelas_id')
                        ->withDefault(['kelas' => 'guru belum dipilih']);
    }
    public function jadwal3()
    {
        return $this->belongsTo(mapel::class, 'mapel_id')
                        ->withDefault(['mapel' => 'guru belum dipilih']);
    }

}
