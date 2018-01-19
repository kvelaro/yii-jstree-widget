<?php $this->pageTitle=Yii::app()->name;?>

<?php $jstreeId = 'tree1';?>
<?php $checkedProducts = [3, 5];?>
<?php echo $this->widget('JsTreeWidget', [
    'jstreeId' => $jstreeId,
    'plugins' => ["search", "state", "types", "wholerow", "checkbox"],
    'selected' => $checkedProducts,
    'data' => $products
], true); ?>