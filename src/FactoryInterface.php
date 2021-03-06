<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid;

use Traversable;

/**
 * Interface FactoryInterface
 * @package Nnx\DataGrid\Column
 */
interface FactoryInterface
{
    /**
     * Создает экземпляр объекта
     * @param array | Traversable | string $spec
     * @return mixed
     */
    public function create($spec);
}
