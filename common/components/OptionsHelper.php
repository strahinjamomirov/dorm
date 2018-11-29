<?php

namespace common\components;

use common\models\Dorm;
use yii\helpers\ArrayHelper;

/**
 * Created by PhpStorm.
 * User: strahinja
 * Date: 11/26/18
 * Time: 10:01 PM
 */
class OptionsHelper
{
    public static function getBooleanList($yes = 'Musko', $no = 'Zensko')
    {
        return [1 => $yes, 0 => $no];
    }

    public static function getDorms()
    {
        return ArrayHelper::map(Dorm::find()->all(), 'id', 'name');
    }

    public static function getCategories()
    {
        return [
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4
        ];
    }


    public static function getNumberOfBeds()
    {
        return [
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6
        ];
    }
}