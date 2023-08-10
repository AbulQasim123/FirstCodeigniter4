<?php

namespace App\Validation;

use Masterminds\HTML5\Serializer\RulesInterface;
use App\Models\ImgUploadModel;

class MobileRules
{
    public function mobileValidation(string $str, string $fields, array $data)
    {
        /*Checking: Number must start from 5-9{Rest Numbers}*/
        if (preg_match('/^[5-9]{1}[0-9]+/', $data['mobile'])) {
        } else {
            return false;
        }
    }

    public function checkLength(string $str, string $fields, array $data){
        /*Checking: Mobile number must be of 10 digits*/
        $bool = preg_match('/^[0-9]{10}+$/', $data['mobile']);
        return $bool == 0 ? false : true;
    }

    // public function alreadyExists(string $str, string $fields, array $data)
    // {
    //     $model = new ImgUploadModel();
    //     dd($model);
    //     $existingData = $model->where('mobile', $data['mobile'])->first();

    //     if (!$existingData) {
    //         return false; // Mobile number already there
    //     }
    //     return true;
    // }
}
