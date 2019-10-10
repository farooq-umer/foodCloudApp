<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionTypes extends Model
{
    protected $table = 'tbl_form_question_types';
    protected $primaryKey = 'form_question_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'form_question_type_name', 'form_question_type_description', 'form_question_type_code',
    ];
}
