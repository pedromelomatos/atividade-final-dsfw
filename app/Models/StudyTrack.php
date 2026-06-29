<?php

namespace App\Models;

use Database\Factories\StudyTrackFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'title',
    'area',
    'level',
    'status',
    'target_hours',
    'completed_hours',
    'start_date',
    'due_date',
    'notes',
])]
class StudyTrack extends Model
{
    /** @use HasFactory<StudyTrackFactory> */
    use HasFactory;

    protected $attributes = [
        'status' => 'planned',
        'completed_hours' => 0,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'target_hours' => 'integer',
            'completed_hours' => 'integer',
            'start_date' => 'date',
            'due_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
