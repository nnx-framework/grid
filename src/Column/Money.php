<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace MteGrid\Grid\Column;

/**
 * Class Money
 * @package MteGrid\Grid\Column
 */
class Money extends AbstractColumn
{
    protected $invokableMutators = [
        'money'
    ];
}