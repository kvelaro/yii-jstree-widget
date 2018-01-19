<div id="<?php echo $jstreeId;?>">
    <?php echo $htmlTree;?>
</div>
<script>
    $('#<?php echo $jstreeId;?>').jstree({
        "core" : {
            check_callback : true,
            animation : 0,
            themes : {
                stripes : true
            },
        },
        plugins: [<?php echo $plugins;?>],
        state: "closed"
    });
    $("#<?php echo $jstreeId;?>").on("ready.jstree", function() {
        var selected = [<?php echo implode(',', $selected);?>];
        var elements = $("#<?php echo $jstreeId;?>").jstree(true).get_json($("#<?php echo $jstreeId;?>"), {flat: true});
        $(elements).each(function(index, value) {
            for (var i in selected) {
                if(selected[i] == value.data.id) {
                    var isLeaf = $("#<?php echo $jstreeId;?>").jstree(true).is_leaf(value.id);
                    if(isLeaf) {
                        $("#<?php echo $jstreeId;?>").jstree(true).select_node(value.id);
                    }
                }
            }
        });
    });
</script>