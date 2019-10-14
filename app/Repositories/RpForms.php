<?php

namespace App\Repositories;

use DB;

class RpForms
{
    protected $tblForms = 'tbl_forms';
    protected $tblFormsSubmitted = 'tbl_forms_submitted';
    protected $tblQuestionTypes = 'tbl_form_question_types';

    public function getFormSubmittedById($formSubmittedId) {
        //$formSubmittedId = \db::quote($formSubmittedId);

        return DB::select("select * from {$this->tblFormsSubmitted} where form_submitted_id = :id", ['id' => $formSubmittedId]);
    }

    public function getQuestionTypeByCode($questionTypeCode) {

        return DB::select("select * from {$this->tblQuestionTypes} where form_question_type_code = :code", ['code' => $questionTypeCode]);
    }
}