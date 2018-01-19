<?php
class JsTreeWidget extends CWidget {
    private $tree = [];
    private $treeHtml = '';
    public $plugins = [];
    public $jstreeId = '';
    public $selected = [];
    public $data = [];

    public function init() {
        parent::init();
        if(empty($this->jstreeId)) {
            throw new Exception('Идентификатор дерева должен быть указан');
        }
        $this->plugins = array_map(function($x) {return '"' . $x . '"';}, $this->plugins);
        $tree = $this->buildTree($this->data);
        $this->treeHtml = $this->buildHtmlTree($tree);
    }

    private function buildTree(array $elements, $parentId = 0, $callback = null) {
        $branch = [];
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id'], $callback);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        if(is_null($callback) == false) {
            $children = $this->$callback($branch, $parentId);
            if(empty($children) == false) {
                $branch = array_merge($branch, $children);
            }
        }
        return $branch;
    }

    private function buildHtmlTree($tree) {
        $html = '<ul>';
        foreach ($tree as $leaf) {
            $html .= '<li
                        data-id="' . $leaf['id'] . '" 
                        data-parent-id="' . $leaf['parent_id']. '"><a href="#">' . $leaf['title'] . '</a>';
            if(isset($leaf['children']) && is_array($leaf['children']) == true) {
                $html .= $this->buildHtmlTree($leaf['children']);
            }
            $html .=  '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    public function run() {
        $this->render('jsTree', [
            'htmlTree' => $this->treeHtml,
            'plugins' => implode(',', $this->plugins),
            'jstreeId' => $this->jstreeId,
            'selected' => $this->selected
        ]);
    }
}