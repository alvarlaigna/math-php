<?php
namespace MathPHP\Probability\Distribution\Continuous;

use MathPHP\Functions\Support;

/**
 * Exponental distribution
 * https://en.wikipedia.org/wiki/Exponential_distribution
 */
class Exponential extends Continuous
{
    /**
     * Distribution support bounds limits
     * x ∈ [0,∞)
     * @var array
     */
    const SUPPORT_LIMITS = [
        'x' => '[0,∞)',
    ];

    /**
     * Distribution parameter bounds limits
     * λ ∈ (0,∞)
     * @var array
     */
    const PARAMETER_LIMITS = [
        'λ' => '(0,∞)',
    ];

    /**
     * Constructor
     *
     * @param float $λ often called the rate parameter
     */
    public function __construct(float $λ)
    {
        parent::__construct($λ);
    }

    /**
     * Probability density function
     *
     * f(x;λ) = λℯ^⁻λx  x ≥ 0
     *        = 0       x < 0
     *
     * @param float $x the random variable
     *
     * @return float
     */
    public function pdf(float $x): float
    {
        if ($x < 0) {
            return 0;
        }
        Support::checkLimits(self::SUPPORT_LIMITS, ['x' => $x]);

        $λ = $this->λ;

        return $λ * exp(-$λ * $x);
    }
    /**
     * Cumulative distribution function
     *
     * f(x;λ) = 1 − ℯ^⁻λx  x ≥ 0
     *        = 0          x < 0
     *
     * @param float $x the random variable
     *
     * @return float
     */
    public function cdf(float $x): float
    {
        if ($x < 0) {
            return 0;
        }
        Support::checkLimits(self::SUPPORT_LIMITS, ['x' => $x]);

        $λ = $this->λ;

        return 1 - exp(-$λ * $x);
    }
    
    /**
     * Mean of the distribution
     *
     * μ = λ⁻¹
     *
     * @return number
     */
    public function mean()
    {
        return 1 / $this->λ;
    }
}
