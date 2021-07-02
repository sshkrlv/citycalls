<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 *
 * @property Customer[] $customers
 * @property Scope[] $scopes
 * @property Technology[] $technologies
 * @property TypeOfProblem[] $types
 */
class FiltersModel extends Model
{
    public $customers;
    public $scopes;
    public $technologies;
    public $types;

    public function init()
    {
        //ArrayHelper::map(Customer::find()->all(), 'customerId', 'brandName');
        $this->customers = Customer::find()->all();
        $this->scopes = Scope::find()->all();
        $this->technologies = Technology::find()->all();
        $this->types = TypeOfProblem::find()->all();
    }

}