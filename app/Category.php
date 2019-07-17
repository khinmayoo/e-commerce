<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * A attribute list that can be inserted by eloquent.
     *
     * @var array
     */

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'descriptions',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
