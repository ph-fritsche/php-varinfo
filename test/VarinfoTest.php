<?php
namespace nextdev\Varinfo;

class VarinfoTest extends \PHPUnit\Framework\TestCase
{
    public function provideVariableDescriptions(): array
    {
        $a = 'foo';

        return [
            [null, 'null'],
            [true, 'true'],
            [false, 'false'],
            [123, 'integer(123)'],
            [1.2, 'float(1.2)'],
            ['foo', 'string(3)'],
            [[1,2,3], 'array(3)'],
            [fopen('php://memory', 'r+'), 'resource(stream)'],
            [new Varinfo($a), Varinfo::class],
        ];
    }

    /**
     * @dataProvider provideVariableDescriptions
     */
    public function testVariableDescriptions(
        $value,
        string $expectedDescription
    ) {
        $varinfo = new Varinfo($value);

        $this->assertEquals($expectedDescription, (string) $varinfo);
    }
}
