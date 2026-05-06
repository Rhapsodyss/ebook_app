<?php

namespace App\Models;

use CodeIgniter\Model;

class StoryModel extends Model
{
    protected $table = 'storis';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'author',
        'image',
        'background_image',
        'description',
        'story_detail',
        'created_at',
        'updated_at'
    ];
}