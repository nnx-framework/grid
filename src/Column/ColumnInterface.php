<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid\Column;

use Nnx\DataGrid\Column\Header\HeaderInterface;
use Nnx\DataGrid\Mutator\MutatorInterface;
use Traversable;

/**
 * Interface ColumnInterface
 * @package Nnx\DataGrid\Column
 */
interface ColumnInterface
{
    /**
     * Устанавливает имя колонки по которому в дальнейшем будут маппиться данные
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * Возвращает имя колонки
     * @return string
     */
    public function getName();

    /**
     * Устанавливает заголовок для колонки
     * @param HeaderInterface | array | Traversable $header
     * @return $this
     */
    public function setHeader($header);

    /**
     * Возвращает объект заголовка для колонки
     * @return HeaderInterface
     */
    public function getHeader();

    /**
     * Устанавливает путь до шаблона строки
     * @param string $template
     * @return $this
     */
    public function setTemplate($template);

    /**
     * Возвраащет путь до шаблона
     * @return string
     */
    public function getTemplate();

    /**
     * Опции и настройки колонки
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options = []);

    /**
     * Возвращает опции колонки
     * @return array
     */
    public function getOptions();

    /**
     * Аттрибут колонки
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function setAttribute($name, $value);

    /**
     * Аттрибуты колонки
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes = []);

    /**
     * Возвращает атрибут колонки
     * @param $name
     * @return mixed|null
     */
    public function getAttribute($name);

    /**
     * Возвращает атрибуты колонки
     * @return array
     */
    public function getAttributes();

    /**
     * Возвращает параметр по которому сортируются колонки
     * @return int
     */
    public function getOrder();

    /**
     * Устанавливает параметр для сортировки колонок
     * @param int $order
     * @return $this
     */
    public function setOrder($order);

    /**
     * Флаг сообщающий можно ли сортировать по колонке
     * @return bool
     */
    public function getSortable();

    /**
     * Устанавливает флаг информирующий можно сортировать или нет по колонке
     * @param bool $sortable
     * @return $this
     */
    public function setSortable($sortable);

    /**
     * @param array|Traversable $mutators
     * @return mixed
     */
    public function setMutators($mutators);

    /**
     * @return array|Traversable
     */
    public function getMutators();

    /**
     * Добавляет мутьатор для ячеек данных
     * @param MutatorInterface $mutator
     * @return mixed
     */
    public function addMutator(MutatorInterface $mutator);

    /**
     * Возвращает массив наименований мутаторов которые по дефолту вызываются для колонки
     * @return array|Traversable
     */
    public function getInvokableMutators();

    /**
     * Устанавливает массив наименований мутаторов
     * @param array|Traversable $invokableMutators
     * @return $this
     */
    public function setInvokableMutators($invokableMutators);
}
