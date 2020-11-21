<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class OtherContent extends Model
{
    use HasFactory;
    /**
     * Desibale created_at and updated_at
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee','client','whatweare','about'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image_url'
    ];

    /**
     * Get the administrator flag for the user.
     *
     * @return bool
     */
    public function getImageUrlAttribute()
    {
        return $this->attributes['image_url'] = Storage::disk('public')->url($this->image);
    }
}
