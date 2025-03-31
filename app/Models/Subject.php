<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
 
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}