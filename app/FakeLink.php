<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakeLink extends Model
{
    protected $fillable = ['fake_link', 'title', 'description', 'img', 'body', 'slug', 'link'];
}
