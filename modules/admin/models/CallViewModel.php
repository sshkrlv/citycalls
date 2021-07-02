<?php
namespace app\modules\admin\models;

use app\models\Call;
use app\models\Scope;
use app\models\Technology;
use app\models\TypeOfProblem;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @property int[] $types
 * @property int[] $scopes
 * @property int[] $technologies
 */
class CallViewModel extends Model //TODO: extend Call class, save() заменить на afterSave(), похожие запросы добавить
{
    //public Call $call;
    public $types = [];
    public $scopes = [];
    public $technologies = [];
    public $relatedCalls = [];
    //public $type2;
    //public $type3;

    public function init()
    {
        //ArrayHelper::map(Customer::find()->all(), 'customerId', 'brandName');

    }

    public function rules()
    {
        return [

            ['types', 'safe'],
            ['scopes', 'safe'],
            ['technologies', 'safe'],
        ];
    }

    /**
     * @param Call $model
     */
    public function save($model){

        $model->unlinkAll('types', true);
        foreach ($this->types as $typeId){
            $type = TypeOfProblem::findOne($typeId);
            $model->link('types', $type);
        }

        $model->unlinkAll('scopes', true);
        foreach ($this->scopes as $scopeId){
            $scope = Scope::findOne($scopeId);
            $model->link('scopes', $scope);
        }

        $model->unlinkAll('technologies', true);
        foreach ($this->technologies as $technologyId){
            $technology = Technology::findOne($technologyId);
            $model->link('technologies', $technology);
        }

        $model->unlinkAll('relatedCalls', true);
        foreach ($this->relatedCalls as $callId){
            $call = Technology::findOne($callId);
            $model->link('relatedCalls', $callId);
        }

        /*foreach ($model->scopes as $scope){
            if(!array_search($scope->primaryKey, $this->scopes)){   }
        }*/
    }
}

