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
        rolePermission::insert(3,1);
        rolePermission::isasnsert(5,1);
        rolePermission::insert(1,2);
        rolePermission::insert(2,2);
        rolePermission::insert(3,2);
        rolePermission::insert(4,2);
        rolePermission::insert(5,2);

        modelList::insert("Notification");
        modelList::insert("Todo");
        modelList::insert("Doing");
        modelList::insert("Done");
        //User::create(array('email' => 'foo@bar.com'));
		// $this->call('UserTableSeeder');
	}

}
