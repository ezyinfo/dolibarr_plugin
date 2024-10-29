<?php

use PHPUnit\Framework\TestCase;

require "lib/Products.php";

class ProductsTest extends TestCase
{

    public function testDefault()
    {
        $ref = "##";
        //$this->assertTrue(true);

        $product = new Products($ref, "prod", "Desc");
        $this->assertSame($ref, $product->getRef());
    }
}
