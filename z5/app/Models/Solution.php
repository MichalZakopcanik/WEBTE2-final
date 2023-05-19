<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Result;

class Solution extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'solution_html',
        'equation_html',
        'image',
        'file_name',
        'points',
        'status',
        'result_id',
    ];

    public function result():BelongsTo{
        return $this->belongsTo(Result::class);
    }
    protected $casts = [
        'image' => 'array',
    ];
}
