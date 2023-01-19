<?php

namespace common\helpers;

class Html
{
    public static function channelLink($user)
    {
        return \yii\helpers\Html::a($user->username,[
            'channel/view', 'username' => $user->username
        ],
            ['class' => 'text-muted']
        );
    }

}