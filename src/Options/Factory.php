<?php
/**
 * @company MTE Telecom, Ltd.
 * @author Roman Malashin <malashinr@mte-telecom.ru>
 */

namespace MteGrid\Grid\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use MteGrid\Grid\Module;
use ArrayAccess;

/**
 * Class Factory 
 * @package MteGrid\Grid\Options
 */
class Factory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $options = [];
        if(array_key_exists(Module::CONFIG_KEY, $config) && $config[Module::CONFIG_KEY] ) {
            if(!is_array($config[Module::CONFIG_KEY]) && $config[Module::CONFIG_KEY] instanceof ArrayAccess) {
                throw new Exception\RuntimeException(
                    sprintf('Конфиг опции модуля Grid должен быть массивом или %s', ArrayAccess::class)
                );
            }
            $options = $config[Module::CONFIG_KEY];
        }
        return new ModuleOptions($options);
    }
}