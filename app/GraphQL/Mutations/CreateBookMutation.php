<?php

namespace App\graphql\Mutations;

use App\Models\Book;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateBookMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createBook'
    ];

    public function type(): Type
    {
        return GraphQL::type('Book');
    }

    public function args(): array
    {
        return [
            'author' => [
                'name' => 'author',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'publish_at' => [
                'name' => 'publish_at',
                'type' =>  Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $book = new Book();
        $book->fill($args);
        $book->save();

        return $book;
    }
}