<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormType extends Model
{
    public $table = 'tbl_form_types';
    //public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FormType', 'FormTypeCode',
    ];
}
