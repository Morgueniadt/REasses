<?php

// Note.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'subject_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Change the subject relationship to many-to-many
    public function subject()
    {
        return $this->belongsToMany(Subject::class);
    }
    // In User.php (Model)
public function notes()
{
    return $this->hasMany(Note::class);
}

}
