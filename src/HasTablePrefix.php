<?php


namespace Socoladaica\LaravelTablePrefix;

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
        return $this->tableWithPrefix ?? $this->getPrefix() . parent::getTable();
    }

    /**
     * Set the table associated with the model.
     *
     * @param  string  $table
     * @return $this
     */
    public function setTable($table)
    {
        $this->tableWithPrefix = $table;

        return $this;
    }
}
