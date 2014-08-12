<?php
/** Created by griga at 12.08.14 | 23:23.
 * @var $model CrudActiveRecord
 * @var $config array
 */

?>
<div class="well">
    <h4><?= t('Custom fields') ?></h4>

    <?php foreach( $config as $field):?>
        <?= $field['title'] ?>

        <?= CHtml::dropDownList('CustomField['.$field['key'].']',$field['value'], $field['values'],
            ['empty'=>'','class'=>'form-control']
        ) ?>
    <?php endforeach;?>

</div>