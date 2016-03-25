<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace MteGrid\Grid\View\Helper\JqGrid;

use Zend\View\Helper\AbstractHelper;
use MteGrid\Grid\GridInterface;
use Zend\View\Helper\EscapeHtml;
use Zend\View\Renderer\PhpRenderer;
use MteGrid\Grid\View\Helper\Exception;

/**
 * Class Grid
 * @package MteGrid\Grid\View\Helper
 */
class Grid extends AbstractHelper
{
    /**
     * @param GridInterface $grid
     * @return string
     * @throws Exception\RuntimeException
     */
    public function __invoke(GridInterface $grid)
    {
        $columns = $grid->getColumns();
        if (count($columns) === 0) {
            throw new Exception\RuntimeException('В гриде нет колонок!');
        }
        /** @var PhpRenderer $view */
        $view = $this->getView();
        /** @var EscapeHtml $escape */
        $escape = $view->plugin('escapeHtml');
        $res = '<table id="grid-' . $escape($grid->getName()) . '"></table>';
        /** @var PhpRenderer $view */
        $view = $this->getView();
        $config = $this->getGridConfig($grid);
        foreach ($columns as $column) {
            $columnClass = get_class($column);
            $columnPath = explode('\\', $columnClass);
            $colName = array_pop($columnPath);
            $helperName = 'mteGridJqGrid' . $colName;
            /** @var string $columnsJqOptions */
            $config['colModel'][] = $view->$helperName($column);
        }
        $view->headScript()->appendScript('$(function(){'
            . 'var grid = $("#grid-' . $grid->getName() . '").jqGrid(' . json_encode((object)$config) . ');});');
        return $res;
    }

    /**
     * @param GridInterface $grid
     * @return array
     */
    protected function getGridConfig(GridInterface $grid)
    {
        $attributes = $grid->getAttributes();
        $config = [
            'shrinkToFit' => false,
            'width' => $this->getConfigVal('width', $attributes, '100%'),
            'datatype' => $this->getConfigVal('datatype', $attributes, 'local')
        ];
        if (!array_key_exists('width', $attributes) && !array_key_exists('autowidth', $attributes)) {
            $config['autowidth'] = true;
        }

        $config = array_merge($config, $attributes);
        return $config;
    }

    /**
     * @param string $key
     * @param array $options
     * @param mixed $default
     * @return null|string|array
     */
    protected function getConfigVal($key, array $options, $default = null)
    {
        return array_key_exists($key, $options) ? $options[$key] : $default;
    }
}