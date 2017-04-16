<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//creation of a table in my db
        Schema::create('users', function($newtable)
        {
            $newtable->increments('id');
            $newtable->string('email')->unique();
            $newtable->string('username', 100)->unique();
            $newtable->string('password', 128)->unique();
            $newtable->string('remember_token', 100);
            //$newtable->timestamps();
            //it was causing an error in mysql, fixed with following line
            //error was: Invalid default value for 'created_at'
            //solution found in:
            //https://github.com/laravel/framework/issues/3602
            //suggested by:
            //sorinstanila commented on 16 Nov 2015
            $newtable->nullableTimestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//The reverse of creating a table is droping
        Schema::drop('users');
	}

}
