<?php

class SitesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('sites')->delete();

        $user = User::find(1);
        
        $sites = array(
            array(
                'created_by' => $user->id,
                'url' => 'http://example.com'
            )
        );

        DB::table('sites')->insert( $sites );
    }

}
