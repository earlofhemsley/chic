<div class="wcsc-sidebar-standard">
<?php foreach(array('one','two','three') as $i => $value){ ?>
    <div class="wcsc-sidebar">
        <?php 
            if(is_active_sidebar('sewchic-sidebar-'. ($i+1))){
                dynamic_sidebar('sewchic-sidebar-'. ($i+1));
            }
        ?>
    </div>
<?php } ?>
</div> 
