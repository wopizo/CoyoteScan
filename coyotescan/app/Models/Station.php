<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Station extends Model
{
    use HasFactory;

    public function records(){
        return $this->hasMany(Record::class);
    }

    public static function stationStatistics($id, $timeStart, $timeFinish, $delta, $marked, $search){
        $resultList = array();
        $query = 'SELECT DISTINCT mac.address as res
                    FROM records rec
                        JOIN stations st ON st.id = rec.station_id
                        JOIN entry_records entry ON rec.id = entry.record_id
                        JOIN mac_addresses mac ON mac.id = entry.mac_address_id
                    WHERE rec.time >= ? AND rec.time < ? AND st.id = ?';

        if(!empty($marked) && $marked == true){
            $query .= ' AND mac.isMarked = 1';
        }

        $timeStartNew = $timeStart;

        while ($timeStartNew < $timeFinish){
            $timeFinishNew = $timeStartNew + $delta;

            $mac_addresses = DB::select($query, [
                date("Y-m-d H:i:s", $timeStartNew),
                date("Y-m-d H:i:s", $timeFinishNew),
                $id]);

            $addresses = [];

            $searchFilter = false;
            foreach($mac_addresses as $mac){
                $addresses[] = $mac->res;
                if(!empty($search) && strpos($mac->res, $search) !== false) {
                    $searchFilter = true;
                }
            }
            if(!empty($addresses) && ( (!empty($search) && $searchFilter) || empty($search)) ){
                $resultList[] = ['time' => date("Y-m-d H:i:s", $timeFinishNew), 'mac_addresses' => $addresses];
            }

            $timeStartNew+=$delta;
        }
        return $resultList;
    }
}
