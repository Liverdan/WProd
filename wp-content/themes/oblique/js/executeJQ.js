/**
 * @author PV3C47FN
 */
jQuery(document).ready(function($) {
    //alert("pouet !!!");
    $(function() {
        $("#sortable").disableSelection();
        console.log ("changement ok");
        $("#sortable").sortable({
            placeholder : "fantom",
            update : function(event, ui) {
                var list = ui.item.parent('ul');
                var cpte = $(list).length;
                console.log(cpte);
                var pos = 0;
                $(list.find("li")).each(function() {
                    pos--;
                    console.log(pos);
                    $(this).find("input.positionInput").val(pos);
                });
            }
        });
    });
});

