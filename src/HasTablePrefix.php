<?php


namespace Socoladaica\LaravelTablePrefix;

use Illuminate\Database\Eloquent\Relations\Pivot;
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

        if ($this instanceof Pivot && ! isset($this->table)) {
            $this->setTable($this->getPrefix() . str_replace(
                '\\', '', Str::snake(Str::singular(class_basename($this)))
            ));
            return $this->tableWithPrefix;
        }

        return $this->getPrefix() . Str::snake(Str::pluralStudly(class_basename($this)));
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
