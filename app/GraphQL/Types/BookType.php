<?php
namespace App\GraphQL\Types;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BookType extends GraphQLType {
    protected $attributes = [
        'name' => 'Book',
        'description' => 'Collection of books and details of Author',
        'model' => Book::class
    ];


    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of a particular book',
            ],
            'author' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The author name of the book',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The book description',
            ],
            'language' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The language which the book was written in',
            ],
            'publish_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The datetime the book was published',
            ],
            'visits' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The visits number for this book',
            ]
        ];
    }
}