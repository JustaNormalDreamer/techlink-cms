<?php

namespace techlink\cms\Tests\Feature;

use Orchestra\Testbench\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_category_index_view()
    {
        $this->withoutExceptionHandling();

       $this->get('cms/categories')
           ->assertOk();
    }
}