<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();


        $users = array(
            array(
                'email'      => 'fmccoy@thisisamg.com',
                'password'   => Hash::make('test'),
                'first_name' => 'Frank',
                'last_name'  => 'McCoy'
            )
        );

        DB::table('users')->insert( $users );
    }

}
