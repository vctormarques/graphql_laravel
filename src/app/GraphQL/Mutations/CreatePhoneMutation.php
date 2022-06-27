<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\Phone;

class CreatePhoneMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createPhone',
        'description' => 'Inserir um novo telefone'
    ];

    public function type(): Type
    {
       return GraphQL::type('phone');
    }

    public function args(): array
    {
        return [
            'number' => [                
                'type' => Type::nonNull(Type::string()),
                'description' => 'Número do telefone'
            ],
            'active' => [                
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Ativado/Desativado'
            ],
            'user_id' => [      
                'type' => Type::nonNull(Type::int()),
                'description' => 'Número do telefone'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $phone = Phone::create([
            'number' => $args['number'],
            'active' => $args['active'],
            'user_id' => $args['user_id'],
        ]);

        return $phone;
    }
}
