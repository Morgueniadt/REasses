<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Define the many-to-many relationship with notes
    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }
}
