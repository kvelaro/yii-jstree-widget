#Yii jstree widget

1. Install and include jstree library.
2. Install downloaded folder in widgets/extensions directory.
3. Add "import" statement into your config file in "import" section, if not added previously.
4. In your view, add following code.

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