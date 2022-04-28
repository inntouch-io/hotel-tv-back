<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class App
 * @package App\Models
 */
class App extends Model
{
    use HasFactory;

    protected $table = 'apps';
    protected $fillable = [
        'name',
        'image',
        'link'
    ];
}
