<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid\Column\Header;

use Nnx\DataGrid\FactoryInterface;
use Nnx\DataGrid\Column\Header\Exception\NoValidSpecificationException;
use Nnx\DataGrid\Column\Header\Exception\NoValidTemplateException;
use Traversable;

/**
 * Фабрика заголовков для колонок таблицы
 * Class Factory
 * @package Nnx\DataGrid\Column\Header
 *
 */
class Factory implements FactoryInterface
{
    /**
     * Валидирует пришедшие данные для создания заголовка колонки
     * @param array | Traversable $spec
     * @throws NoValidSpecificationException
     * @throws NoValidTemplateException
     */
    protected function validate($spec)
    {
        if (!is_array($spec)
            && !$spec instanceof Traversable) {
            throw new NoValidSpecificationException(
                sprintf('Спецификация для создания заголовка колонки должна быть массивом или реализовывать %s',
                    Traversable::class)
            );
        }
    }


    protected function checkOption($key, $options)
    {
        $option = null;
        if (array_key_exists($key, $options) && $options[$key]) {
            $option = $options[$key];
        }
        return $option;
    }


    /**
     * Создает экземпляр класса фабрики
     * @param array|Traversable $spec
     * @throws NoValidSpecificationException
     * @throws NoValidTemplateException
     * @return HeaderInterface
     */
    public function create($spec)
    {
        $this->validate($spec);
        $options = $this->checkOption('options', $spec);
        $data = $this->checkOption('data', $spec);
        $title = $this->checkOption('title', $spec);
        $template = $this->checkOption('template', $spec);
        $header = new SimpleHeader($title, $template, ($data ?: []), ($options ?: []));
        return $header;
    }
}
