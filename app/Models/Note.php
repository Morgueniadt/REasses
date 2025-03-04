<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Importing the HasFactory trait to enable factory functionality.
use Illuminate\Database\Eloquent\Model;  // Importing the base Model class for Eloquent ORM functionality.

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',              // The title of the note.
        'content',            // The content of the note.
        'file_url',           // The URL or file path for any attached files to the note.
        'user_id',            // The ID of the user who created the note.
        'subject_id',         // The ID of the subject to which the note belongs.
        'created_at',         // Timestamp of when the note was created (automatically handled by Eloquent).
        'updated_at',         // Timestamp of when the note was last updated (automatically handled by Eloquent).
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'note_tag', 'note_id', 'tag_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'note_id');
    }
}
