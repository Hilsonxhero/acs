<?php

namespace App\Models;

use App\Services\MediaFileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Media extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'files',
        'type',
        'filename',
        'is_private',
        'user_id',
    ];



    protected $casts = [
        'files' => 'json'
    ];
    use HasFactory;

    public function thumb()
    {
        return MediaFileService::thumb($this);
    }
    public function original()
    {
        return MediaFileService::original($this);
    }
    protected static function booted()
    {
        static::deleting(function ($media) {
            MediaFileService::delete($media);
        });
    }

    public function service()
    {
        return $this->hasOne('App\Models\Service');
    }

    public function project()
    {
        return $this->hasOne('App\Models\Project');
    }

    public function team_member()
    {
        return $this->hasOne('App\Models\TeamMember');
    }

    public function feed_back()
    {
        return $this->hasOne('App\Models\Feedback');
    }

    public function aboutUs()
    {
        return $this->hasMany(General::class, 'about_us->media_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
