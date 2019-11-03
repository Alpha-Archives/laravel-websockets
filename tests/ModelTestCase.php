<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

abstract class ModelTestCase extends TestCase
{

    protected function runConfigurationAssertions(
        Model $model,
        $fillable = [],
        $hidden = [],
        $guarded = ['*'],
        $visible = [],
        $casts = ['id' => 'int'],
        $dates = ['created_at', 'updated_at'],
        $collectionClass = Collection::class,
        $table = null,
        $primaryKey = 'id',
        $connection = null
    )
    {
        $this->assertEquals($fillable, $model->getFillable());
        $this->assertEquals($guarded, $model->getGuarded());
        $this->assertEquals($hidden, $model->getHidden());
        $this->assertEquals($visible, $model->getVisible());
        $this->assertEquals($casts, $model->getCasts());
        $this->assertEquals($dates, $model->getDates());
        $this->assertEquals($primaryKey, $model->getKeyName());

        $c = $model->newCollection();
        $this->assertEquals($collectionClass, get_class($c));
        $this->assertInstanceOf(Collection::class, $c);

        if ($connection !== null) {
            $this->assertEquals($connection, $model->getConnectionName());
        }

        if ($table !== null) {
            $this->assertEquals($table, $model->getTable());
        }
    }



    /**
     * @param  $related_model
     * @param $relationship
     * @param $foreign_key
     */
    public function assertHasManyUsing($related_model, $relationship, $foreign_key)
    {
        $this->assertInstanceOf(HasMany::class, $relationship);
        $this->assertInstanceOf($related_model, $relationship->getRelated());
        $this->assertEquals($foreign_key, $relationship->getForeignKeyName());
        $this->assertTrue(Schema::hasColumns($relationship->getRelated()->getTable(), array($foreign_key)));
    }

    /**
     * @param  $related_model
     * @param $relationship
     * @param $foreign_key
     */
    public function assertBelongsToUsing($related_model, $relationship, $foreign_key)
    {
        $this->assertInstanceOf(BelongsTo::class, $relationship);
        $this->assertInstanceOf($related_model, $relationship->getRelated());
        $this->assertEquals($foreign_key, $relationship->getForeignKeyName());
        $this->assertTrue(Schema::hasColumns($relationship->getParent()->getTable(), array($foreign_key)));
    }
}
