<?php

namespace Socoladaica\LaravelTablePrefix;

use Illuminate\Support\Str;

trait HasTablePrefix
{
    protected string $tableWithPrefix;

    /**
     * Get the prefix associated with the model.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix ?? '';
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        if (isset($this->tableWithPrefix)) {
            return $this->tableWithPrefix;
        }

        $this->setTable(parent::getTable());

        return $this->tableWithPrefix;
    }

    /**
     * Set the table associated with the model.
     *
     * @param string $table
     *
     * @return $this
     */
    public function setTable($table)
    {
        
        $this->tableWithPrefix = Str::start($this->getPrefix().$table, $this->getPrefix());

        parent::setTable(Str::after($this->tableWithPrefix, $this->getPrefix()));

        return $this;
    }

    public static function getTableName()
    {
        return with(new static())->getTable();
    }
}
