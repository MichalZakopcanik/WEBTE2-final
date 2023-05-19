<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\User;

class Assignment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from_time',
        'to_time',
        'max_points',
        'tex_files',
        'created_by',
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
    
    public function owner():BelongsTo{
        return $this->belongsTo(User::class,'created_by');
    }
    public function getAttributeFileList(){

        //return json_encode($this->tex_files);

        return implode(', ',$this->tex_files);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assignment_user', 'assignment_id', 'user_id');
    }
    public function fileList(): Attribute
    {
        /*return new Attribute(function ($value) {
            return json_decode($value, true);
        });*/
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => implode(", ",json_decode($attributes['tex_files'])),
        );
    }
}