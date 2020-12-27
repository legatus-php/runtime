<?php

declare(strict_types=1);

/**
 * @project Legatus Runtime
 * @link https://github.com/legatus-php/runtime
 * @package legatus/runtime
 * @author Matias Navarro-Carter mnavarrocarter@gmail.com
 * @license MIT
 * @copyright 2021 Matias Navarro-Carter
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Legatus\Support;

/**
 * Class Env.
 */
class Env
{
    private string $name;
    private bool $required;

    public static function named(string $name): Env
    {
        return new self($name);
    }

    /**
     * Env constructor.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->required = false;
    }

    public function required(): Env
    {
        $this->required = true;

        return $this;
    }

    /**
     * @throws RequiredEnvVar
     */
    protected function getValue(): ?string
    {
        $value = $_SERVER[$this->name] ?? $_ENV[$this->name] ?? getenv($this->name) ?? null;
        if (is_string($value)) {
            return $value;
        }
        if ($this->required === true) {
            throw new RequiredEnvVar($this->name);
        }

        return null;
    }

    /**
     * @throws RequiredEnvVar if the variable is required and not defined
     */
    public function asBool(bool $default = true): bool
    {
        $value = $this->getValue();
        if ($value === null) {
            return $default;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @throws RequiredEnvVar if the variable is required and not defined
     */
    public function asInt(int $default = 0): int
    {
        $value = $this->getValue();
        if ($value === null) {
            return $default;
        }

        return (int) $value;
    }

    /**
     * @throws RequiredEnvVar if the variable is required and not defined
     */
    public function asString(string $default = ''): string
    {
        return $this->getValue() ?? $default;
    }
}
