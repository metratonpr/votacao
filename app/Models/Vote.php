<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'computerName'];

    public function singers(){
        return $this->belongsToMany(Singer::class);
    }

    public function elections(){
        return $this->belongsToMany(Election::class);
    }

    public function singer(){
        return $this->BelongsTo(Singer::class);
    }

    public function election(){
        return $this->BelongsTo(Election::class);
    }

}
