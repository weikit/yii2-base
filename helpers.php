<?php
use yii\helpers\Html;

/**
 * 定义一些常用函数和简化Yii的常用方法
 */

if (! function_exists('app')) {
    /**
     * Yii::$app简化函数
     *
     * ```php
     * app(); // 返回Yii::$app
     * ```
     *
     * @return \yii\console\Application|\yii\web\Application
     */
    function app()
    {
        return \Yii::$app;
    }
}

if (! function_exists('user')) {
    /**
     * Yii::$app->user简化函数
     *
     * ```php
     * user(); // 返回Yii::$app->user;
     * ```
     *
     * @return mixed|\yii\web\User
     */
    function user()
    {
        return \Yii::$app->user;
    }
}

if (! function_exists('identity')) {
    /**
     * Yii::$app->user->identity简化函数
     *
     * ```php
     * identity(); // 返回Yii::$app->user->identity;
     * identity($user) // Yii::$app->user->setIdentity($user);
     * ```
     *
     * @param null $user
     * @return null|\yii\web\IdentityInterface
     */
    function identity($user = null)
    {
        if ($user !== null) {
            \Yii::$app->user->setIdentity($user);
        }
        return \Yii::$app->user->identity;
    }
}

if (! function_exists('request')) {
    /**
     * Yii::$app->request简化函数
     *
     * ```php
     * request(); // 返回Yii::$app->user;
     * ```
     * @return \yii\console\Request|\yii\web\Request
     */
    function request()
    {
        return \Yii::$app->request;
    }
}

if (! function_exists('response')) {
    /**
     * Yii::$app->response
     *
     * ```php
     * response(); // 返回Yii::$app->response;
     * ```
     *
     * @return \yii\console\Response|\yii\web\Response
     */
    function response()
    {
        return \Yii::$app->response;
    }
}

if (! function_exists('formatter')) {
    /**
     * Yii::$app->formatter
     *
     * ```php
     * formatter(); // 返回Yii::$app->formatter;
     * ```
     *
     * @return \yii\i18n\Formatter
     */
    function formatter()
    {
        return \Yii::$app->formatter;
    }
}

if (! function_exists('e')) {
    /**
     * Html::encode简化函数
     *
     * ```php
     * e('string');
     * ```
     *
     * @param $value
     * @param bool $doubleEncode
     * @return string
     */
    function e($value, $doubleEncode = true)
    {
        return Html::encode($value, $doubleEncode);
    }
}

if (! function_exists('trait_uses_recursive')) {
    /**
     * 返回类所使用的(包括继承的)trait
     *
     * @param string $trait
     * @return array
     */
    function trait_uses_recursive($trait)
    {
        $traits = class_uses($trait);

        foreach ($traits as $trait) {
            $traits += trait_uses_recursive($trait);
        }

        return $traits;
    }
}