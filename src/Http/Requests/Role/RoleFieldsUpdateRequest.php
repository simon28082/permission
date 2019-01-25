<?php

namespace CrCms\Permission\Http\Requests\Role;

use CrCms\Foundation\Transporters\AbstractValidateDataProvider;

class RoleFieldsUpdateRequest extends AbstractValidateDataProvider
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:roles,id'],
            'field' => ['required', 'array', 'exists:fields,id'],
        ];
    }

    /**
     * @return array
     */
    public function attributes(): array
    {
        return [
            'id' => '角色id',
            'field' => '字段id'
        ];
    }
}