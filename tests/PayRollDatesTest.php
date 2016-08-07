<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PayRollDatesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
		$this->visit('/');

		Artisan::call('dates:generate');

		Artisan::call('dates:generate', [
            'filename' => 'newfilename'
        ]);

		Artisan::call('dates:generate', [
            'filename' => 'newfilename',
            'year' => '2017',
        ]);
    }
}
