<?php

/** Created by griga at 12.08.14 | 23:34.
 *
 */
class CustomFieldBehavior extends CActiveRecordBehavior
{


    private $customFields;

    public function getCustomFieldValue($key)
    {
        if (!$this->customFields) {
            $this->customFields = db()->createCommand()->select('*')->from('{{custom_field}}')->where(
                'entity=:e AND entity_id=:eid', [
                    ':e' => get_class($this->owner),
                    ':eid' => $this->owner->primaryKey,
                ]
            )->queryAll();
        }
        foreach ($this->customFields as $field) {
            if ($field['key'] == $key)
                return $field['value'];
        }
        return null;
    }

    public function afterSave($event)
    {
        foreach (db()->createCommand()->select('key')->from('{{custom_field_config}}')->where('entity=:e', [':e' => get_class($this->owner)])->queryColumn() as $key) {
            if (isset($_POST['CustomField'][$key]))
                db()->createCommand('INSERT INTO {{custom_field}} (entity, entity_id, `key`, `value`) VALUES (:e, :eid, :k, :v)  ON DUPLICATE KEY UPDATE value=:v')->execute([
                    ':e' => get_class($this->owner),
                    ':eid' => $this->owner->primaryKey,
                    ':k' => $key,
                    ':v' => $_POST['CustomField'][$key],
                ]);
        }
    }


} 