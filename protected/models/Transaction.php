<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property integer $id
 * @property string $Payment_date
 * @property integer $personId
 * @property string $playingCurrency
 * @property double $playingOriginalAmount
 */
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Payment_date, personId, playingCurrency, playingOriginalAmount', 'required'),
			array('personId', 'numerical', 'integerOnly'=>true),
			array('playingOriginalAmount', 'numerical'),
			array('playingCurrency', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Payment_date, personId, playingCurrency, playingOriginalAmount', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Payment_date' => 'Payment Date',
			'personId' => 'Person',
			'playingCurrency' => 'Playing Currency',
			'playingOriginalAmount' => 'Playing Original Amount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('Payment_date',$this->Payment_date,true);
		$criteria->compare('personId',$this->personId);
		$criteria->compare('playingCurrency',$this->playingCurrency,true);
		$criteria->compare('playingOriginalAmount',$this->playingOriginalAmount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function initDB(){
		$count = Transaction::model()->count();

		if($count <= 0){
			$fileName = Yii::app()->basePath . "/data/testdata.csv";
			$query = <<<eof
	LOAD DATA INFILE '$fileName'
	INTO TABLE transaction
	FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
	LINES TERMINATED BY '\n'
	IGNORE 1 LINES
	(Payment_date,personId,playingCurrency,playingOriginalAmount)	
eof;
			$connection=Yii::app()->db; 
			$command=$connection->createCommand($query);
			$rowCount=$command->execute(); // execute the non-query SQL	
		}
	}

	public static function getOrdersPerMonth(){
		$sql = "SELECT MONTH(Payment_date) as month, COUNT(Payment_date) as count
			FROM transaction
			GROUP BY MONTH(Payment_date)";

		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$results=$command->queryAll(); 
		
		return ['month' => array_column($results, 'month'), 
			'count' => array_column($results, 'count')
		];
	}
}
