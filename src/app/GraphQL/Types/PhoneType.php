<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PhoneType extends GraphQLType
{
    protected $attributes = [
        'name' => 'phone',
        'description' => 'Representa os telefones'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'O id do telefone'
            ],
            'number' => [
                'type' => Type::string(),
                'description' => 'O numero do telefone'
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'O status ativado/desativado do telefone'
            ]

        ];
    }
}
