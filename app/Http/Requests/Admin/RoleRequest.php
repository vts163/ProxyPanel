<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules()
    {
        $unq_name = '';
        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $unq_name = ','.$this->role->id;
        }

        return [
            'name'        => 'required|string|unique:roles,name'.$unq_name,
            'description' => 'required|string',
            'permissions' => 'exists:permissions,name',
        ];
    }
}
