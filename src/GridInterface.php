<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace MteGrid\Grid;

use MteGrid\Grid\Adapter\AdapterInterface;
use MteGrid\Grid\Column\ColumnInterface;
use Traversable;
use ArrayAccess;

/**
 * Interface GridInterface
 * @package MteGrid\Grid
 */
interface GridInterface
{
    /**
     * Условия для фильтрации выбираемых данных
     * @param array | Traversable $conditions
     * @return $this
     */
    public function setConditions($conditions);

    /**
     * Возвращает набор условий по которым фильтровать выборку
     * @return array
     */
    public function getConditions();

    /**
     * Устанавливает адаптер
     * @param AdapterInterface $adapter
     * @return $this
     */
    public function setAdapter($adapter);

    /**
     * Возвращает адаптер с помощью которого будет осуществляться выборка данных
     * @return AdapterInterface
     */
    public function getAdapter();

    /**
     * Возвращает коллекцию колонок
     * @return array | Traversable
     */
    public function getColumns();

    /**
     * Добавление колонок в таблицу
     * @param array | Traversable $columns
     * @return $this
     */
    public function setColumns($columns);

    /**
     * Добавление колонки в таблицу
     * @param ColumnInterface | array | ArrayAccess $column
     * @return $this
     */
    public function add($column);

    /**
     * Возвращает колонку грида
     * @param string $name
     * @return ColumnInterface
     */
    public function get($name);

    /**
     * Опции таблицы
     * @param array | Traversable $options
     * @return $this
     */
    public function setOptions($options);

    /**
     * Возвращает массив опции таблицы
     * @return array | Traversable
     */
    public function getOptions();
}