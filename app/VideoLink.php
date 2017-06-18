<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoLink extends Model
{
    protected $table = 'video_links';

    protected $fillable = ['title', 'website', 'image_url', 'video_link', 'real_link', 'link_basic', 'user_id', 'full_link', 'embed', 'link_fb', 'user_name'];
}
