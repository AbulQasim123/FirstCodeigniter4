<?php

namespace App\Validation;

use App\Models\AuthLoginModel;

class MultiAuthUserrules
{
    public function multiValidateUser(string $str, string $fields, array $data)
    {
        $model = new AuthLoginModel();
        $user = $model->where('email', $data['email'])->first();
        if (!$user) {
            return false;
        }
        return password_verify($data['password'], $user['password']);
    }
}
