<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        role::insert("regular");
        role::insert("admin");
        permission::insert("sisteme giriş yapabilme");
        permission::insert("görev ekleme");
        permission::insert("görev durum değiştirme");
        permission::insert("kişilere görev atama");
        permission::insert("görev reddetme");
        rolePermission::insert(1,1);
        rolePermission::insert(1,3);
        rolePermission::insert(1,5);
        rolePermission::insert(2,1);
        rolePermission::insert(2,2);
        rolePermission::insert(2,3);
        rolePermission::insert(2,4);
        rolePermission::insert(2,5);



        //User::create(array('email' => 'foo@bar.com'));
		// $this->call('UserTableSeeder');
	}

}
