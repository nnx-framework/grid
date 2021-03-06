<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid\Column;

use Nnx\DataGrid\Column\Action\ActionInterface;

/**
 * Interface ActionAwareInterface
 * @package Nnx\DataGrid\Column
 */
interface ActionAwareInterface
{
    /**
     * Получает набор действий
     * @return array
     */
    public function getActions();

    /**
     * Добавляет действия
     * @param array $actions
     * @return $this
     */
    public function setActions($actions);

    /**
     * Добавляет действие в колонку
     * @param array|ActionInterface $action
     * @return mixed
     */
    public function addAction($action);
}
