<?php

class TreeController extends Controller {

    public function actionIndex() {
        $products = [
            [
                'id' => 1,
                'parent_id' => null,
                'title' => '#1'
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'title' => '#2'
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'title' => '#3'
            ],
            [
                'id' => 4,
                'parent_id' => 2,
                'title' => '#4'
            ],
            [
                'id' => 5,
                'parent_id' => null,
                'title' => '#5'
            ],
        ];
        $this->render('index', ['products' => $products]);
    }
}