<?php

namespace App\Models;

use Database\Factories\StudyTrackFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * @return array<string, string>
     */
    public static function levels(): array
    {
        return [
            'beginner' => 'Iniciante',
            'intermediate' => 'Intermediario',
            'advanced' => 'Avancado',
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function statuses(): array
    {
        return [
            'planned' => 'Planejada',
            'active' => 'Em andamento',
            'paused' => 'Pausada',
            'completed' => 'Concluida',
        ];
    }

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

    public function levelLabel(): string
    {
        return self::levels()[$this->level] ?? $this->level;
    }

    public function statusLabel(): string
    {
        return self::statuses()[$this->status] ?? $this->status;
    }

    public function progressPercentage(): int
    {
        if ($this->target_hours === 0) {
            return 0;
        }

        return min(100, (int) round(($this->completed_hours / $this->target_hours) * 100));
    }
}
