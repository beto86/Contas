<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $update_at
 *
 * @property Bills[] $bills
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    public function behaviors()//para validar hora e data quando cria uma nova categoria
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                //'createdAtAttribute' => 'create_at',
                //'updatedAtAttribute' => 'update_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Criado em',
            'updated_at' => 'Ultima atualização',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bills::className(), ['category_id' => 'id']);
    }

    public static function getOptions(){
        return ArrayHelper::map(static::find()->orderBy('name ASC')->all(), 'id', 'name');
    }
}
