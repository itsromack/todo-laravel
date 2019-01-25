<?php

namespace FileInviteExam;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
        'item',
        'due_date',
        'is_completed'
    ];

    public function getItem()
    {
        return $this->item;
    }

    public function getDueDate($format = false)
    {
        if ($format == true)
        {
            return $this->getFormattedDueDate();
        }
        return $this->due_date;
    }

    public function getFormattedDueDate()
    {
        $dt = new Carbon($this->due_date);
        return $dt->toFormattedDateString();
    }

    public function isCompleted()
    {
        return ($this->is_completed == 1);
    }

    public static function createTask(
        $item,
        $due_date = null,
        $is_completed = null
    )
    {
        $task = new static;
        $task->item = $item;
        if (!is_null($due_date))
        {
            $task->due_date = $due_date;
        }
        if (!is_null($is_completed) and is_bool($is_completed))
        {
            $task->is_completed = $is_completed;
        }
        return $task->save();
    }

    public function setCompleted()
    {
        $this->is_completed = true;
        return $this->save();
    }

    public function updateItem(
        $item,
        $due_date = null,
        $is_completed = null
    )
    {
        $this->item = $item;
        if (!is_null($due_date))
        {
            $this->due_date = $due_date;
        }
        if (!is_null($is_completed) and is_bool($is_completed))
        {
            $this->is_completed = $is_completed;
        }
        return $this->save();
    }
}
