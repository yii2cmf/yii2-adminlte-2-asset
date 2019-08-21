<?php
namespace yii2cmf\adminlte\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Menu extends Widget
{
    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
        return $this->getMenu();

    }

    private function getMenu()
    {
        $menu = '';
        foreach ($this->items as $key => $menuItem) {
            self::getMenuItem($menu, $menuItem, true);
        }
        return $menu;
    }

    private static function getMenuItem(string &$menu, array $menuItem, bool $parent = false):void
    {
        if (array_key_exists('items', $menuItem)) {
            if ($parent) {
                $active = isset($menuItem['active']) && $menuItem['active'] ? 'treeview active menu-open' : 'treeview';
            } else {
                $active = isset($menuItem['active']) && $menuItem['active'] ? 'active' : '';
            }
            $menu .= Html::beginTag('li', ['class' => "$active"]);
        } else {
            $active = isset($menuItem['active']) && $menuItem['active'] ? 'active' : '';
            $menu .= Html::beginTag('li', ['class' => "$active"]);;
        }

        $menu .= Html::beginTag('a', ['href' => isset($menuItem['url']) ? Url::toRoute($menuItem['url']) : '#']);
        $menu .= Html::tag('i', '', ['class' => self::getIcon($menuItem, $parent)]);
        $menu .= Html::tag('span', $menuItem['label']);

        if (array_key_exists('items', $menuItem)) {
            $menu .= Html::beginTag('span', ['class' => 'pull-right-container']);
            $menu .= Html::tag('i', '',['class' => 'fa fa-angle-left pull-right']);
            $menu .= Html::endTag('span');
        }

        $menu .= Html::endTag('a');

        if (array_key_exists('items', $menuItem)) {
            self::displayChildren($menu, $menuItem['items']);
        }
        $menu .= Html::endTag('li');
    }

    private static function displayChildren(&$menu, $menuItem):void
    {
        $menu .= Html::beginTag('ul', ['class' => 'treeview-menu']);
        // display each child
        foreach ($menuItem as $key => $subMenuItem) {
            self::getMenuItem($menu, $subMenuItem);
        }
        $menu .= Html::endTag('ul');
    }

    private static function getIcon(array $menuItem, bool $parent)
    {
        if ($parent && !isset($menuItem['icon']) && isset($menuItem['items'])) {
            return 'fa fa-share';
        } elseif(!isset($menuItem['icon']) && !isset($menuItem['items'])){
            return 'fa fa-circle-o';
        } else {//elseif ($parent && isset($menuItem['icon']))
            return $menuItem['icon'];
        }
    }
}
