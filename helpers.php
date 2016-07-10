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

if (! function_exists('db')) {
    /**
     * Yii::$app->db
     *
     * ```php
     * db(); // 返回Yii::$app->db;
     *
     * // 返回\Yii::$app->db->createCommand(SELECT * FROM {{%tableName}} WHERE a=:a', [':a' => 1]);
     * // 该类型可以直接执行sql语句并可以调用\yii\db\Command下的类方法
     * db('SELECT * FROM {{%tableName}} WHERE a=:a', [':a' => 1]);
     * ```
     *
     * @param null $sql
     * @param array $params
     * @return \yii\db\Command|\yii\db\Connection
     */
    function db($sql = null, $params = [])
    {
        if ($sql !== null) {
            return \Yii::$app->db->createCommand($sql, $params);
        }
        return \Yii::$app->db;
    }
}

if (! function_exists('cache')) {
    /**
     * Yii::$app->cache
     *
     * ```php
     * cache(); // 返回Yii::$app->cache;
     * cache('xxx') // 返回Yii::$app->cache->get('xxx');
     * cache('xxx', 'yyy', 3600) // 返回Yii::$app->cache->set('xxx', 'yyy', 3600);
     * ```
     *
     * @param null $key
     * @param null $value
     * @param int $duration
     * @param yii\caching\Dependency $dependency
     * @return bool|mixed|\yii\caching\Cache
     */
    function cache($key = null, $value = null, $duration = 0, $dependency = null)
    {
        if ($key !== null) {
            if ($value === null) {
                return \Yii::$app->cache->get($key);
            }
            return \Yii::$app->cache->set($key, $value, $duration, $dependency);
        }
        return \Yii::$app->cache;
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

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
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