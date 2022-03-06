<?php

namespace Tests\Unit;

use App\Exceptions\PreconditionException;
use App\Services\CalculatePointService;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Throwable;

use function PHPUnit\Framework\assertSame;

class CalculatePointServiceTest extends TestCase
{
    // public function dataProvider_for_calcPoint(): array
    // {
    //     return [
    //         '購入金額が0円なら0ポイント' => [0, 0],
    //         '購入金額が999円なら0ポイント' => [0, 999],
    //         '購入金額が1000円なら10ポイント' => [10, 1000],
    //         '購入金額が9999円なら99ポイント' => [99, 9999],
    //         '購入金額が10000円なら200ポイント' => [200, 10000],
    //     ];
    // }

    // /**
    //  * @test
    //  */
    // public function calcPoint_0_0()
    // {
    //     $result = CalculatePointService::calcPoint(0);
    //     $this->assertSame(0, $result);
    // }

    // /**
    //  * @test
    //  */
    // public function calcPoint_1000_10()
    // {
    //     $result = CalculatePointService::calcPoint(1000);
    //     $this->assertSame(10, $result);
    // }

    // /**
    //  * @test
    //  * @dataProvider dataProvider_for_calcPoint
    //  */
    // public function calcPoint(int $expected, int $amount)
    // {
    //     $result = CalculatePointService::calcPoint($amount);
    //     $this->assertSame($expected, $result);
    // }

    // /**
    //  * @test
    //  */
    // public function exception_try_catch()
    // {
    //     try {
    //         throw new InvalidArgumentException('message', 200);
    //         $this->fail();
    //     } catch (Throwable $e) {
    //         $this->assertInstanceOf(InvalidArgumentException::class, $e);
    //         $this->assertSame(200, $e->getCode());
    //         $this->assertSame('message', $e->getMessage());
    //     }
    // }

    // /**
    //  * @test
    //  */
    // public function exception_expectException_method()
    // {
    //     $this->expectException(InvalidArgumentException::class);
    //     $this->expectExceptionCode(200);
    //     $this->expectExceptionMessage('message');

    //     throw new InvalidArgumentException('message', 200);
    // }

    /**
     * @test
     */
    public function calcPoint_minus_exception()
    {
        $this->expectException(PreconditionException::class);
        $this->expectExceptionMessage('購入金額が負の数');

        CalculatePointService::calcPoint(-1);
    }
}
