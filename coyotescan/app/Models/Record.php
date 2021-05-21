<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Record extends Model
{
    use HasFactory;

    public function station(){
        return $this->belongsTo(Station::class);
    }

    public function entryRecordes(){
        return $this->hasMany(EntryRecord::class);
    }

    public static function generalStatistics($stationList, $timeStart, $timeFinish, $delta, $marked){
        $resultList = array();
        $query = 'SELECT COUNT(DISTINCT mac.address) as res
                    FROM records rec
                        JOIN stations st ON st.id = rec.station_id
                        JOIN entry_records entry ON rec.id = entry.record_id
                        JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                    WHERE rec.time >= ? AND rec.time < ? AND st.id = ?';

        if(!empty($marked) && $marked == true){
            $query .= ' AND mac.isMarked = 1';
        }

        foreach ($stationList as $station){
            $timeStartNew = $timeStart;

            $count = 0;
            while ($timeStartNew < $timeFinish){
                $timeFinishNew = $timeStartNew + $delta;
                $count += DB::select($query, [
                    date("Y-m-d H:i:s", $timeStartNew),
                    date("Y-m-d H:i:s", $timeFinishNew),
                    $station->id])[0]->res;

                $timeStartNew+=$delta;
            }
            $resultList[] = ['address' => $station->address, 'count' => $count];
        }
        return $resultList;
    }
}
