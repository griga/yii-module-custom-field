<?php


class CustomFieldAdminWidget extends CWidget{
    public $model;
    public function run()
    {
        $config = db()->createCommand()->select('*')->from('{{custom_field_config}}')
            ->where('entity=:e',[
                    ':e'=>get_class($this->model)
                ])
            ->queryAll();

        foreach($config as &$field){
            $field['values']=[];
            foreach(json_decode($field['meta']) as $option){
                $field['values'][$option] = $option;
            }
            $field['value']= $this->model->getCustomFieldValue($field['key']);

        }
        $this->render('customFieldAdminWidget',[
            'model'=>$this->model,
            'config'=>$config,
        ]);

    }

}



