<?php
/** Created by griga at 25.11.13 | 14:01.
 * @var $model Config
 */

$this->breadcrumbs = [
    t('Custom Field')=>'/admin/customfield',
    t('Settings')
];
?>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h3><?= t('Custom field settings'); ?></h3>
            <?php $this->widget('\yg\tb\ModalRemoteLink', [
                'href' => app()->createUrl('customfield/admin/create'),
                'label' => '<span class="glyphicon glyphicon-plus"></span> '.t('add'),
                'htmlOptions' => [
                    'id' => 'customfield-add-launcher',
                    'class' => 'btn btn-success btn-xs',
                    'data-modal-success-rise'=>'customfieldAdded',
                ]
            ]);?>
            <?php

            $this->widget('\yg\tb\GridView', [
                'id' => 'customfield-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => [
                    'entity',
                    'title',
                    'key',
                    [
                        'class' => '\yg\tb\AjaxButtonColumn',
                        'updateModalSuccessRise'=>'customfieldAdded',
                        'controllerId'=>'admin',
                        'moduleId'=>'customfield',
                    ],
                ]
            ]); ?>

        </div>
    </div>
<script type="text/javascript">
    $(function(){
        $('#customfield-grid').parent().on('customfieldAdded', function(event, data){
            $.fn.yiiGridView.update("customfield-grid");
        });
    })
</script>