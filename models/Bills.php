<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%bills}}".
 *
 * @property int $id
 * @property int $category_id
 * @property int $type
 * @property string $date
 * @property string $description
 * @property string $amount
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Categories $category
 */
class Bills extends \yii\db\ActiveRecord
{
    const TYPE_RECEIVE = 1;
    const TYPE_PAY = 2;

    const STATUS_OPENED = 1;
    const STATUS_PAYED_RECEIVED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bills}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'type', 'date', 'description', 'amount'], 'required'],
            [['category_id', 'type', 'status'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
            [['description'], 'string', 'max' => 60],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    public function behaviors()//para validar hora e data quando cria uma nova 
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
            'category_id' => 'Categoria',
            'type' => 'Tipo',
            'date' => 'Data',
            'description' => 'Descrição',
            'amount' => 'Saldo',
            'status' => 'Status',
            'created_at' => 'Creado em',
            'updated_at' => 'Ultima Atualização',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function isOpened(){
        return (int)$this->status === static::STATUS_OPENED;
    }

    public function getTypeText(){
        return static::getTypeOptions()[$this->type];
    }

    public function getStatusText(){
        return static::getStatusOptions()[$this->status];
    }

    public static function getTypeOptions(): array
    {
        return [
            static::TYPE_RECEIVE => 'Contas à Receber',
            static::TYPE_PAY => 'Contas à Pagar',
        ];
    }

    public static function getStatusOptions(): array
    {
        return [
            static::STATUS_OPENED => 'Em Aberto',
            static::STATUS_PAYED_RECEIVED => 'Pago/Recebido',
        ];
    }
}