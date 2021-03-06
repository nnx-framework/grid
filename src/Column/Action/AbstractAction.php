<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace Nnx\DataGrid\Column\Action;

use Zend\View\Helper\Url;

/**
 * Class AbstractAction
 * @package Nnx\DataGrid\Column\Action
 */
abstract class AbstractAction implements ActionInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Заголовок действия
     * @var string
     */
    protected $title;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * Роут для построения линки
     * @var array
     */
    protected $route;

    /**
     * UrlHelper для построения линки
     * @var Url
     */
    protected $urlHelper;

    /**
     * Опции для действия
     * @var array
     */
    protected $options;

    /**
     * Функция валидирующая необходимость отображения действия
     * @var callback | array
     */
    protected $validationFunction;


    /**
     * Конструктор класса
     * @param array $options
     * @throws Exception\NameNotDefinedException
     */
    public function __construct(array $options = [])
    {
        if (!array_key_exists('name', $options)) {
            throw new Exception\NameNotDefinedException(
                'Для корректной работы действий необходимо задать имя действия'
            );
        } else {
            $this->setName($options['name']);
        }
        if (array_key_exists('title', $options)) {
            $this->setTitle($options['title']);
        }
        if (array_key_exists('route', $options)) {
            $this->setRoute($options['route']);
        }
        if (array_key_exists('urlHelper', $options)) {
            $this->setUrlHelper($options['urlHelper']);
        }
    }

    /**
     * Возвращает заголовок действия
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Устнаваливает заголовок действия
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Возвращает готовую ссылку на которую ведет действие
     * @return string
     */
    public function getUrl()
    {
        $urlHelper = $this->getUrlHelper();
        $route = $this->getRoute();
        return $urlHelper($route['routeName'], $route['routeParams'], $route['routeOptions']);
    }

    /**
     * Возвращает роут для действия
     * @return array
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Устанавливает route для действия
     * @param array $route
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * Возвращает хелпер который преобразует route в url
     * @return Url
     */
    public function getUrlHelper()
    {
        return $this->urlHelper;
    }

    /**
     * Устанавливает хелпер который преобразует route в url
     * @param Url $urlHelper
     * @return $this
     */
    public function setUrlHelper($urlHelper)
    {
        $this->urlHelper = $urlHelper;
        return $this;
    }

    /**
     * Функция непосредственно валидирующая необходимость отображения действия
     * @return bool
     */
    abstract public function validate();

    /**
     * Возвращает имя действия
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Устанавливает имя действия
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Возвращает набор опций для действия
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Устнаваливает набор опций для действия
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Возвращает набор атрибутов действия
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Устанавливаем атрибуты для действия
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Возвращает функцию которая сообщает отображать или не отображать действие.
     * @return array|callable
     */
    public function getValidationFunction()
    {
        return $this->validationFunction;
    }

    /**
     * Устнаваливает функцию которая сообщает отображать или не отображать действие.
     * @param array|callable $validationFunction
     * @return $this
     */
    public function setValidationFunction($validationFunction)
    {
        $this->validationFunction = $validationFunction;
        return $this;
    }
}
