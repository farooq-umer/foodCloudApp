<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormType extends Model
{
    protected $table = 'tbl_form_types';
    protected $primaryKey = 'form_type_id';
    //public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_type_name', 'form_type_code',
    ];
}
