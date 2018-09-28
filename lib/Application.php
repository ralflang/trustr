<?php
/**
 * Copyright 2010-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (GPL). If you
 * did not receive this file, see http://www.horde.org/licenses/gpl.
 *
 * @author   Ralf Lang <lang@b1-systems.de>
 * @category Horde
 * @license  http://www.horde.org/licenses/gpl GPL
 * @package  Trustr
 */

/* Determine the base directories. */
if (!defined('TRUSTR_BASE')) {
    define('TRUSTR_BASE', realpath(__DIR__ . '/..'));
}

if (!defined('HORDE_BASE')) {
    /* If Horde does not live directly under the app directory, the HORDE_BASE
     * constant should be defined in config/horde.local.php. */
    if (file_exists(TRUSTR_BASE . '/config/horde.local.php')) {
        include TRUSTR_BASE . '/config/horde.local.php';
    } else {
        define('HORDE_BASE', realpath(TRUSTR_BASE . '/..'));
    }
}

/* Load the Horde Framework core (needed to autoload
 * Horde_Registry_Application::). */
require_once HORDE_BASE . '/lib/core.php';

/**
 * Trustr application API.
 *
 * This class defines Horde's core API interface. Other core Horde libraries
 * can interact with Trustr through this API.
 *
 * @author    Ralf Lang <lang@b1-systems.de>
 * @category  Horde
 * @copyright 2010-2017 Horde LLC
 * @license   http://www.horde.org/licenses/gpl GPL
 * @package   Trustr
 */
class Trustr_Application extends Horde_Registry_Application
{
    /**
     */
    public $version = 'H5 (0.1-git)';

    /**
     * Bootstrapping of core application logic
     * Do not put each and everything in here as some initialisations might be expensive and only rarely used
     */
    protected function _bootstrap()
    {
        $GLOBALS['injector']->bindFactory('Trustr_Driver', 'Trustr_Factory_Driver', 'create');
    }

    /**
     * Adds items to the sidebar menu.
     *
     * Simple sidebar menu entries go here. More complex entries are added in
     * the sidebar() method.
     *
     * @param $menu Horde_Menu  The sidebar menu.
     */
    public function menu($menu)
    {
        /* If index.php == lists.php, jump some extra loops to highlight the
         * menu entry. */
        $menu->add(
            Horde::url('/home'),
            _("Home"),
            'trustr-home',
            null,
            null,
            null,
            basename($_SERVER['PHP_SELF']) == 'index.php' ? 'current' : null);
    }

    /**
     * Adds additional items to the sidebar.
     *
     * @param Horde_View_Sidebar $sidebar  The sidebar object.
     */
    public function sidebar($sidebar)
    {
        /* No "New" action for now
        $sidebar->addNewButton(
            _("_Add Item"),
            Horde::url('new.php')
        );*/
    }

    /**
     * Add node(s) to the topbar tree.
     *
     * @param Horde_Tree_Renderer_Base $tree  Tree object.
     * @param string $parent                  The current parent element.
     * @param array $params                   Additional parameters.
     *
     * @throws Horde_Exception
     */
    public function topbarCreate(Horde_Tree_Renderer_Base $tree, $parent = null,
                                 array $params = array())
    {
        switch ($params['id']) {
        case 'menu':
            $tree->addNode(array(
                'id' => $parent . '__sub',
                'parent' => $parent,
                'label' => _("Sub Item"),
                'expanded' => false,
                'params' => array(
                    'icon' => Horde_Themes::img('add.png'),
                    'url' => Horde::url('item.php'),
                ),
            ));
            break;
        }
    }
}
