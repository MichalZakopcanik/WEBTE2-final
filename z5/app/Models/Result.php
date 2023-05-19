<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;
use App\Models\Assignment;
use App\Models\Solution;

class Result extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'points_total',
        'user_id',
        'assignment_id',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'from_time' => 'datetime',
        'to_time' => 'datetime',
        'tex_files' => 'array',
    ];

    public function student():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function teacher():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function assginment():BelongsTo{
        return $this->belongsTo(Assignment::class);
    }
    public function solutions():HasMany{
        return $this->hasMany(Solution::class);
    }
}
