<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use App\GraphQL\Types\UserType;
use App\Models\Phone;
use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PhoneQuery extends Query
{
    protected $attributes = [
        'name' => 'phones',
        'description' => 'Listar todos telefones'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('phone'));

    }

    public function args(): array
    {
        return [
           
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Phone::all()->where('active', true);
    }
}
