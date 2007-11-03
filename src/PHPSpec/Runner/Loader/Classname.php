<?php
/**
 * PHPSpec
 *
 * LICENSE
 *
 * This file is subject to the GNU Lesser General Public License Version 3
 * that is bundled with this package in the file LICENSE.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/lgpl-3.0.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@phpspec.org so we can send you a copy immediately.
 *
 * @category   PHPSpec
 * @package    PHPSpec
 * @copyright  Copyright (c) 2007 P�draic Brady, Travis Swicegood
 * @license    http://www.gnu.org/licenses/lgpl-3.0.txt GNU Lesser General Public Licence Version 3
 */

/**
 * @category   PHPSpec
 * @package    PHPSpec
 * @copyright  Copyright (c) 2007 P�draic Brady, Travis Swicegood
 * @license    http://www.gnu.org/licenses/lgpl-3.0.txt GNU Lesser General Public Licence Version 3
 */
class PHPSpec_Runner_Loader_Classname
{

    protected $_loaded = array();

    public function load($className)
    {
        $class = $className;
        if (substr($className, strlen($className) - 4, 4) == '.php') {
            $classFile = $className;
            $class = substr($className, 0, strlen($className) - 4);
        } else {
            $classFile = $className . '.php';
        }

        require_once $classFile;

        $classReflected = new ReflectionClass($class);

        $this->_loaded = array($classReflected);

        return $this->_loaded;
    }

    public function getLoaded()
    {
        return $this->_loaded;
    }

}