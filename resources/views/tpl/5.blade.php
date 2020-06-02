<ul>
    <?php
    foreach ($vars as $var) {
    if (strpos($var, '[') !== false) {
    ?>
    <img src="<?php echo str_replace('[', '', $var);?>">
    <?php
    continue;
    }?>
    <li>
        <?php
        if (strpos($var, '(') !== false) {
        $var = str_replace('(', '', $var);
        ?>
        <b><?php echo $excel[$var][$lan];?></b>
        <?php
        } else {
            echo $excel[$var][$lan];
        }?>
    </li>
    <?php }?>
</ul>
