<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid;

use Nnx\DataGrid\Adapter\AdapterInterface;
use Nnx\DataGrid\Column\ColumnInterface;
use Nnx\DataGrid\Mutator\MutatorInterface;
use Nnx\DataGrid\NavigationBar\NavigationBarInterface;
use Traversable;
use ArrayAccess;
use Zend\Stdlib\InitializableInterface;

/**
 * Interface GridInterface
 * @package Nnx\DataGrid
 */
interface GridInterface extends InitializableInterface
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
     * Удаляет колонку с именем $name из таблицы
     * @param string $name
     * @return $this
     */
    public function remove($name);

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

    /**
     * Устанавливает имя таблицы
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Возвращает имя таблицы
     * @return string
     */
    public function getName();

    /**
     * Возвращает атрибуты используемые при отображении грида
     * @return array
     */
    public function getAttributes();

    /**
     * Устанавливает используемые для отображения таблицы атрибуты
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes);

    /**
     * Добавляет атрибут таблицы
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function addAttribute($key, $value);

    /**
     * Возвращает набор мутаторов для строк таблицы
     * @return array|ArrayAccess
     */
    public function getMutators();

    /**
     * Устанавливает набор мутаторов для строк таблицы
     * @param array|ArrayAccess $mutators
     * @return $this
     */
    public function setMutators(array $mutators);

    /**
     * Добавляет мутатор для строк таблицы
     * @param MutatorInterface|array|ArrayAccess $mutator
     * @return $this
     */
    public function addMutator($mutator);

    /**
     * Возвращает массив строк
     * @return array
     */
    public function getRowSet();

    /**
     * Возвращвет верхнюю навигационную панель
     * @return NavigationBarInterface
     */
    public function getTopNavigationBar();

    /**
     * Устанавливает верхнюю навигационную панель
     * @param NavigationBarInterface $topNavigationBar
     * @return $this
     */
    public function setTopNavigationBar($topNavigationBar);

    /**
     * Возвращвет верхнюю навигационную панель
     * @return NavigationBarInterface
     */
    public function getBottomNavigationBar();

    /**
     * Устанавливает верхнюю навигационную панель
     * @param NavigationBarInterface $bottomNavigationBar
     * @return $this
     */
    public function setBottomNavigationBar($bottomNavigationBar);
}
