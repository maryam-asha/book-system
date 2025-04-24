<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'author_id',
        'category_id',
        'publication_year',
        'pages',
        'price',
        'isbn',
    ];
    public function author():BelongsTo{
         return $this->belongsTo(Author::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
