#Yii jstree widget

1. Install jstree library.
2. Include library. 
3. Install downloaded folder in widgets/extensions directory.
4. Add "import" statement into your config file in "import" sectoin if not added previously.
5 In your view, add following code
```
<?php $jstreeId = 'tree1';?>
<?php $checkedProducts = [3, 5];?>
<?php echo $this->widget('JsTreeWidget', [
    'jstreeId' => $jstreeId,
    'plugins' => ["search", "state", "types", "wholerow", "checkbox"],
    'selected' => $checkedProducts,
    'data' => $products
], true); ?>  
```

You are done.