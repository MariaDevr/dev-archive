<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Str;

class ArchiveTest extends TestCase
{

    public function test_category_slug_generation()
    {
        $name = "Livros de DevOps";
        $slug = Str::slug($name);

        $this->assertEquals('livros-de-devops', $slug);
    }

    public function test_content_url_is_valid()
    {
        $url = "https://github.com/MariaDevr/dev-archive";

        $this->assertNotFalse(filter_var($url, FILTER_VALIDATE_URL));
    }

    public function test_content_type_is_valid()
    {
        $allowedTypes = ['link', 'book', 'video', 'article'];
        $myContentType = 'book';

        $this->assertContains($myContentType, $allowedTypes);
    }

    public function test_content_metadata_is_array()
    {
        $metadata = [
            'author' => 'Robert Martin',
            'pages' => 464
        ];

        $this->assertIsArray($metadata);
        $this->assertArrayHasKey('author', $metadata);
    }


    public function test_content_status_is_defined()
    {
        $status = 'published';
        $this->assertNotEmpty($status);
    }
}
