<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddQuestion extends Model
{
    protected $table = 'tbl_form_question';
    protected $primaryKey = 'form_question_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_question', 'form_question_type_id', 'form_id', 'is_mandatory'
    ];
}
