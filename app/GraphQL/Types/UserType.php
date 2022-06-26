<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\User;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'Listando todos usuários',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'O id do usuário no banco'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'O nome do usuário no banco'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'O email do usuário no banco'
            ],
            'phones' => [
                'type' => Type::listOf(GraphQL::type('phone')),
                'description' => 'Lista de telefone por usuário',
            ]
        ];
    }
}
