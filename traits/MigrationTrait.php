<?php
namespace weikit\base\traits;

/**
 * 数据库迁移Trait
 * 添加一些常用的数据库迁移选项
 * @package weikit\base\traits
 * @property string $tableOptions
 * @property boolean $isMySql
 * @property boolean $isMssql
 */
trait MigrationTrait
{
    /**
     * 是否mysql
     *
     * @return bool
     */
    public function getIsMysql()
    {
        return $this->db->driverName === 'mysql';
    }

    /**
     * 是否mssql
     *
     * @return bool
     */
    protected function getIsMssql()
    {
        return $this->db->driverName === 'mssql' || $this->db->driverName === 'sqlsrv' || $this->db->driverName === 'dblib';
    }

    /**
     * 获取tableOptions
     *
     * @param string $engine 引擎类型
     * @return string
     */
    public function getTableOptions($engine = 'InnoDB')
    {
        if ($this->getIsMysql()) {
            return 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=' . $engine;
        }
        return null;
    }
}