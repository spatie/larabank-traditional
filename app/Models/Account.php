<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $guarded = [];

    public function addMoney(int $amount)
    {
        $this->balance += $amount;

        $this->save();
    }

    public function subtractMoney(int $amount)
    {
        $this->balance -= $amount;

        $this->save();
    }
}
