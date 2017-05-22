<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Quest extends Model
{

    protected $guarded = ['id'];

    /**
     * @param $id //пользователя
     * @return bool
     *
     * Если пользователь записан на квест (оплатил) - возвращает true
     */
    public function isPlayer($id){
        $isPlayer = DB::table('quest_players')->where('quest_id', $this->id)->where('user_id', $id)->first();

        if($isPlayer) return true;
        else return false;
    }

    /**
     * Если квест сейчас идет
     */
    public function isStart(){
        $now = Carbon::now();
        $start = Carbon::parse($this->start_date);
        $end = $this->end_date ? Carbon::parse($this->end_date) : Carbon::tomorrow();
        return  $now->between($start, $end);
    }

    /**
     * Возвращает список заданий для этого квеста
     */
    public function allTasks(){
        $tasks =  DB::table('quest_tasks')->where('quest_id', $this->id)->get();
        return $tasks;
    }
}
