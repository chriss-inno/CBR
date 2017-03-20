<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 11-Mar-17
 * Time: 05:48
 */
if (!function_exists('checkProtectionNeed')) {
    function checkProtectionNeed($assessment_id,$need){
        if (count(\App\ProtectionAssessmentNeed::where('assessment_id','=',$assessment_id)->where('needs','=',$need)->get()) >0 ){
            return "checked";
        }
        else
        {
            return "";
        }
    }

}