<?php

declare(strict_types=1);

namespace App\Tests\Unit\Helper;

use App\Helper\StringHelper;
use PHPUnit\Framework\TestCase;
use Symfony\Component\String\Slugger\AsciiSlugger;

/**
 * Delete this test if you want to verify that the coverage checker script works
 * properly.
 */
final class StringHelperTest extends TestCase
{
    /**
     * @return iterable<array{0: string|null, 1: string}>
     */
    public static function provideSlugify(): iterable
    {
        yield ['', ''];
        yield [null, ''];
        yield ['  Symfony IS GreAT ! !!', 'symfony-is-great'];
    }

    /**
     * @dataProvider provideSlugify
     *
     * @covers \App\Helper\StringHelper::slugify
     */
    public function testSlugify(string|null $input, string $expected): void
    {
        $stringHelper = new StringHelper(new AsciiSlugger());
        self::assertSame($expected, $stringHelper->slugify($input));
    }
}
