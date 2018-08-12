<?php

namespace Test\RS3;

use PHPStan\Testing\TestCase;
use function RuneStat\RS3\validate_rsn;

class ValidateRsnTest extends TestCase
{
    /** @test */
    public function it_validates_an_rsn()
    {
        $this->assertTrue(validate_rsn('Zezima'));
    }

    /** @test */
    public function it_takes_exception_to_an_rsn_that_is_too_long()
    {
        $this->assertFalse(validate_rsn('thisdisplaynameistoolong'));
    }

    /** @test */
    public function it_takes_exception_to_an_rsn_with_symbols()
    {
        $this->assertFalse(validate_rsn('!@£$'));
    }

    /** @test */
    public function it_takes_exception_to_an_rsn_with_emojis()
    {
        $this->assertFalse(validate_rsn('🎉'));
    }
}
