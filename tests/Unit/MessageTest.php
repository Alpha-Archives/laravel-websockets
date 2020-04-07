<?php

namespace Tests\Unit;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ModelTestCase;

class MessageTest extends ModelTestCase
{
    use RefreshDatabase;
    /** @test */
    public function testFillableAttribute()
    {
        $model = new \App\Message();
        $fillable = ['message'];
        $this->assertEquals($fillable, $model->getFillable());
    }

    /** @test */
    public function testMessageUser()
    {
        $user = factory(\App\User::class)->create();
        $m = $user->messages()->create([
            'message' => 'Message'
        ]);

        $this->assertBelongsToUsing(\App\User::class, $m->user(), 'user_id');
    }

}
