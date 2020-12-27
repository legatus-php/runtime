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
 * @param string $name
 *
 * @return Env
 */
function env(string $name): Env
{
    return new Env($name);
}
