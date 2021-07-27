<?php
//https://sharemycode.fr/u69
namespace App\Tests\Service;

use App\Service\Utils;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
    public function puissanceProvider() //notion Provider dans documentation PHP ->https://phpunit.readthedocs.io/fr/latest/writing-tests-for-phpunit.html#fournisseur-de-donnees
    {
        return [
            '2 puissance 3'  => [2, 3, 8],
            '1000 puissance 0' => [1000, 0, 1],
            '0 puissance 0' => [0, 0, 1],
            '1000 puissance 2'  => [1000, 2, 1000000]
        ];
    }

    /**
     * @dataProvider puissanceProvider
     */
    public function testPuissance($a, $b, $expected)
    {
        //appeler la fonction et stocker le resultat
        $res = Utils::puissance($a, $b);
        //comparaison des 2 valeurs : expected et res
        $this->assertSame($expected, $res);
    }
    public function testPuissanceThrowsInvalidArgumentException() //test robutesse : entrée invalides
    {
        $this->expectException(InvalidArgumentException::class);
        $a = 5;
        $n = -5;
        $res = Utils::puissance($a, $n);
    }
}
