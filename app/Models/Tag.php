<?php
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
 
    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }
}