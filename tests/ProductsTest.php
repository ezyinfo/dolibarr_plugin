<?php

use PHPUnit\Framework\TestCase;

require "lib/Products.php";

class ProductsTest extends TestCase
{

    public function testDefault()
    {
        $this->assertTrue(true);

        $product = new Products("##", "prod", "Desc");
        $this->assertSame("##", $product->getRef());
    }
}
