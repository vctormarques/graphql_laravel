<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use App\GraphQL\Types\UserType;
use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'Listar todos usuários'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user'));

    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'O id do usuário'
            ],
            'paginate' => [
                'type' => Type::int(),
                'description' => 'Quantidade de registros'
            ]
        ];
    }

    public function resolve($root, array $args, $context, SelectFields $fields, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return User::where('id', $args['id'])->get();
        }
        if (isset($args['paginate'])) {
            return User::paginate($args['paginate']);
        }
        return User::all();
    }
}
