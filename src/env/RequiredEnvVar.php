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

use RuntimeException;

/**
 * Class RequiredEnvVar.
 */
class RequiredEnvVar extends RuntimeException
{
    private string $name;

    /**
     * RequiredEnvVar constructor.
     */
    public function __construct(string $name)
    {
        parent::__construct('Required environment variable (%s) is missing');
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
