<?php
namespace Math\Probability;
require_once( __DIR__ . '/../../src/Probability/Distribution.php' );

class DistributionTest extends \PHPUnit_Framework_TestCase {

  /**
   * @dataProvider dataProviderForBinomial
   */
  public function testBinomial( int $n, int $r, float $p, float $binomial_distribution ) {
    $this->assertEquals( $binomial_distribution, Distribution::binomial( $n, $r, $p ), '', 0.001 );
  }

  /**
   * Data provider for binomial
   * Data: [ n, r, p, binomial distribution ]
   */
  public function dataProviderForBinomial() {
    return [
      [ 2, 1, 0.5, 0.5 ],
      [ 2, 1, 0.4, 0.48 ],
      [ 6, 2, 0.7, 0.0595350 ],
      [ 8, 7, 0.83, 0.3690503 ],
      [ 10, 5, 0.85, 0.0084909 ],
      [ 50, 48, 0.97, 0.2555182 ],
      [ 5, 4, 1, 0.0 ],
    ];
  }

  public function testBinomialProbabilityLowerBoundException() {
    $this->setExpectedException('\Exception');
    Distribution::binomial( 6, 2, -0.1 );
  }

  public function testBinomialProbabilityUpperBoundException() {
    $this->setExpectedException('\Exception');
    Distribution::binomial( 6, 2, 1.1 );
  }

  /**
   * @dataProvider dataProviderForNegativeBinomial
   */
  public function testNegativeBinomial( int $x, int $r, float $P, float $neagative_binomial_distribution ) {
    $this->assertEquals( $neagative_binomial_distribution, Distribution::negativeBinomial( $x, $r, $P ), '', 0.001 );
  }

  /**
   * Data provider for neagative binomial
   * Data: [ x, r, P, negative binomial distribution ]
   */
  public function dataProviderForNegativeBinomial() {
    return [
      [ 2, 1, 0.5, 0.25 ],
      [ 2, 1, 0.4, 0.24 ],
      [ 6, 2, 0.7, 0.019845 ],
      [ 8, 7, 0.83, 0.322919006776561 ],
      [ 10, 5, 0.85, 0.00424542789316406 ],
      [ 50, 48, 0.97, 0.245297473979909 ],
      [ 5, 4, 1, 0.0 ],
      [ 2, 2, 0.5, 0.25 ],

    ];
  }

  public function testNegativeBinomialProbabilityLowerBoundException() {
    $this->setExpectedException('\Exception');
    Distribution::negativeBinomial( 6, 2, -0.1 );
  }

  public function testNegativeBinomialProbabilityUpperBoundException() {
    $this->setExpectedException('\Exception');
    Distribution::negativeBinomial( 6, 2, 1.1 );
  }

  /**
   * @dataProvider dataProviderForPascal
   */
  public function testPascal( int $x, int $r, float $P, float $neagative_binomial_distribution ) {
    $this->assertEquals( $neagative_binomial_distribution, Distribution::pascal( $x, $r, $P ), '', 0.001 );
  }

  /**
   * Data provider for Pascal
   * Data: [ x, r, P, negative binomial distribution ]
   */
  public function dataProviderForPascal() {
    return [
      [ 2, 1, 0.5, 0.25 ],
      [ 2, 1, 0.4, 0.24 ],
      [ 6, 2, 0.7, 0.019845 ],
      [ 8, 7, 0.83, 0.322919006776561 ],
      [ 10, 5, 0.85, 0.00424542789316406 ],
      [ 50, 48, 0.97, 0.245297473979909 ],
      [ 5, 4, 1, 0.0 ],
      [ 2, 2, 0.5, 0.25 ],

    ];
  }

  public function testPascalProbabilityLowerBoundException() {
    $this->setExpectedException('\Exception');
    Distribution::pascal( 6, 2, -0.1 );
  }

  public function testPascalProbabilityUpperBoundException() {
    $this->setExpectedException('\Exception');
    Distribution::pascal( 6, 2, 1.1 );
  }

  /**
   * @dataProvider dataProviderForPoisson
   */
  public function testPoisson( int $k, float $λ, float $probability ) {
    $this->assertEquals( $probability, Distribution::poisson( $k, $λ ), '', 0.001 );
  }

  /**
   * Data provider for poisson
   * Data: [ k, λ, poisson distribution ]
   */
  public function dataProviderForPoisson() {
    return [
      [ 3, 2, 0.180 ],
      [ 3, 5, 0.140373895814280564513 ],
      [ 8, 6, 0.103257733530844 ],
      [ 2, 0.45, 0.065 ],
    ];
  }

  /**
   * @dataProvider dataProviderForCumulativePoisson
   */
  public function testCumulativePoisson( int $k, float $λ, float $probability ) {
    $this->assertEquals( $probability, Distribution::cumulativePoisson( $k, $λ ), '', 0.001 );
  }

  /**
   * Data provider for cumulative poisson
   * Data: [ k, λ, culmulative poisson distribution ]
   */
  public function dataProviderForCumulativePoisson() {
    return [
      [ 3, 2, 0.857123460498547048662 ],
      [ 3, 5, 0.2650 ],
      [ 8, 6, 0.8472374939845613089968 ],
      [ 2, 0.45, 0.99 ],
    ];
  }

  public function testPoissonExceptionWhenKLessThanZero() {
    $this->setExpectedException('\Exception');
    Distribution::poisson( -1, 2 );
  }

  public function testPoissonExceptionWhenλLessThanZero() {
    $this->setExpectedException('\Exception');
    Distribution::poisson( 2, -1 );
  }
}