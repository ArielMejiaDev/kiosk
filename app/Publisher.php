<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Publisher class
 *
 * @property string                                   $name
 * @property \Illuminate\Database\Eloquent\Collection $books
 * @method static \App\Publisher find($column, $value = null)
 * @method static \Illuminate\Database\Eloquent\Builder where($column, $operator = null, $value = null, $boolean = null)
 * @method static \Illuminate\Database\Eloquent\Builder create(array $attributes = [])
 * @method public \Illuminate\Database\Eloquent\Builder update(array $values)
 * @package App
 */
class Publisher extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public    $incrementing = false;

    public    $keyType      = 'string';

    protected $fillable     = [
        'name'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function authors()
    {
        return $this->hasManyThrough(Author::class, Book::class);
    }
}
