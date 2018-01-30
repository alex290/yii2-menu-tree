<?php

namespace alex290\treemenu;

use yii\base\Widget;
use yii\helpers\Url;

/**
 * Description of NavHover
 *
 * @author art
 */
class MenuTree extends Widget {

    public $arrMenu;

    public function run() {
        $arrMenuTree = $this->getTree();
        $templ = '<ul class="nav navbar-nav">';
        $templ .= $this->getMenuHtml($arrMenuTree);
        $templ .= '</ul>';
        return $templ;
    }
    
     protected function getMenuHtml($treesMenu){
        $tree = '';
        foreach ($treesMenu as $treeMenu) {
            $tree .= $this->catToTemplate($treeMenu);
        }
        return $tree;
    }
    
    protected function catToTemplate($category){
        ob_start();
        include __DIR__ . '/menu_tpl/menu.php';
        return ob_get_clean();
    }
    protected function getTree() {
        $tree = [];
        $catstree = $this->arrMenu;
        foreach ($catstree as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $catstree[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        $treeOne = $tree;
        
        return $treeOne;
    }
    

}
