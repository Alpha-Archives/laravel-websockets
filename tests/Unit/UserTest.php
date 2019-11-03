<?php

namespace Tests\Unit;


use Tests\ModelTestCase;

class UserTest extends ModelTestCase
{
    /** @test */
    public function testFillableAttribute()
    {
        $model = new \App\User();
        $fillable = ['name', 'email', 'password'];
        $this->assertEquals($fillable, $model->getFillable());
    }

    /** @test */
    public function testHiddenAttribute()
    {
        $model = new \App\User();
        $hidden = ['password', 'remember_token',];
        $this->assertEquals($hidden, $model->getHidden());
    }

    /** @test */
    public function testCastAttribute()
    {
        $model = new \App\User();
        $cast = [
            'id' => 'int',
            'email_verified_at' => 'datetime',
        ];
        $this->assertEquals($cast, $model->getCasts());
    }


    /** @test */
    public function testUserMessageRelation()
    {
        $user = factory(\App\User::class)->create();

        $user->messages()->save(factory(\App\Message::class)->make());

        $this->assertHasManyUsing(\App\Message::class, $user->messages(), 'user_id');
    }

}
