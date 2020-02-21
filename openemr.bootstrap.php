<?php

use OpenEMR\Menu\MenuEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

function oe_module_telegram_add_menu_item(MenuEvent $event)
{
    $menu = $event->getMenu();

    $menuItem = new stdClass();
    $menuItem->requirement = 0;
    $menuItem->target = 'mod';
    $menuItem->menu_id = 'mod0';
    $menuItem->label = xlt("Telegram Module - simple script");
    $menuItem->url = "/interface/modules/custom_modules/oe-module-telegram/src/Infrastructure/Ui/Web/public/index.php";
    $menuItem->children = [];
    $menuItem->acl_req = ["patients", "docs"];
    //$menuItem->global_req = ["oefax_enable"];

    foreach ($menu as $item) {
        if ($item->menu_id == 'modimg') {
            $item->children[] = $menuItem;
            break;
        }
    }

    $event->setMenu($menu);

    return $event;
}
/**
 * @var EventDispatcherInterface $eventDispatcher
 * @var array                    $module
 * @global                       $eventDispatcher @see ModulesApplication::loadCustomModule
 * @global                       $module          @see ModulesApplication::loadCustomModule
 */
$eventDispatcher->addListener(MenuEvent::MENU_UPDATE, 'oe_module_telegram_add_menu_item');


function oe_module_telegram_add_menu_item_foo(MenuEvent $event)
{
    $menu = $event->getMenu();

    $menuItem = new stdClass();
    $menuItem->requirement = 0;
    $menuItem->target = 'mod';
    $menuItem->menu_id = 'mod0';
    $menuItem->label = xlt("Telegram Module - Foo Controller");
    $menuItem->url = "/interface/modules/custom_modules/oe-module-telegram/src/Infrastructure/Ui/web/FooController.php";
    $menuItem->children = [];
    $menuItem->acl_req = ["patients", "docs"];
    //$menuItem->global_req = ["oefax_enable"];

    foreach ($menu as $item) {
        if ($item->menu_id == 'modimg') {
            $item->children[] = $menuItem;
            break;
        }
    }

    $event->setMenu($menu);

    return $event;
}
/**
 * @var EventDispatcherInterface $eventDispatcher
 * @var array                    $module
 * @global                       $eventDispatcher @see ModulesApplication::loadCustomModule
 * @global                       $module          @see ModulesApplication::loadCustomModule
 */
$eventDispatcher->addListener(MenuEvent::MENU_UPDATE, 'oe_module_telegram_add_menu_item_foo');



function oe_module_telegram_add_menu_item_bar(MenuEvent $event)
{
    $menu = $event->getMenu();

    $menuItem = new stdClass();
    $menuItem->requirement = 0;
    $menuItem->target = 'mod';
    $menuItem->menu_id = 'mod0';
    $menuItem->label = xlt("Telegram Module - Bar Controller");
    $menuItem->url = "/interface/modules/custom_modules/oe-module-telegram/src/Infrastructure/Ui/web/BarController.php";
    $menuItem->children = [];
    $menuItem->acl_req = ["patients", "docs"];
    //$menuItem->global_req = ["oefax_enable"];

    foreach ($menu as $item) {
        if ($item->menu_id == 'modimg') {
            $item->children[] = $menuItem;
            break;
        }
    }

    $event->setMenu($menu);

    return $event;
}
/**
 * @var EventDispatcherInterface $eventDispatcher
 * @var array                    $module
 * @global                       $eventDispatcher @see ModulesApplication::loadCustomModule
 * @global                       $module          @see ModulesApplication::loadCustomModule
 */
$eventDispatcher->addListener(MenuEvent::MENU_UPDATE, 'oe_module_telegram_add_menu_item_bar');
