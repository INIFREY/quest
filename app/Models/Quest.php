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
     * @param $id //пользователя
     *
     * Добавляет нового пользователя к квесту
     */
    public function addPlayer($id){
        DB::table('quest_players')->insert(
            ['user_id' => $id, 'quest_id' => $this->id, 'task'=>0, 'created_at' => \Carbon\Carbon::now()->toDateTimeString(),]
        );
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


    /**
     * @param $id //пользователя
     * @return mixed
     *
     *  Возвращает задание, на котором остановился пользователь
     */
    public function getTask($id){
        $taskNumber = DB::table('quest_players')->where('quest_id', $this->id)->where('user_id', $id)->first();


        if ($this->getLastTask() <= $taskNumber->task) return "finish";
        else{
            $task = DB::table('quest_tasks')->where('quest_id', $this->id)->where('sorting', ++$taskNumber->task)->first();
            return $task;
        }

    }

    /**
     * @param $id //пользователя
     * @return mixed
     *
     *  Увеличивает номер текущего вопроса пользователя
     */
    public function nextTask($id){
        $taskNumber = DB::table('quest_players')->where('quest_id', $this->id)->where('user_id', $id)->increment('task');
        return $taskNumber;


    }

    /**
     * Возвращает номер последнего задания
     */
    public function getLastTask(){
        $last = DB::table('quest_tasks')->where('quest_id', $this->id)->max('sorting');
        return $last;
    }

    /**
     *  Проверяет, закончился ли квест
     */
    public function finished(){
        $now = Carbon::now();
        $end = Carbon::parse($this->end_date);
        return $now>$end;
    }
}
