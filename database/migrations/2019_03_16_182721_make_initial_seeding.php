<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeInitialSeeding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('categories')->insert(array(
            array('name'=>'أغانى عربية','name_en'=>'arabic songs', 'id' => 1, 'color' => 'blue', 'photo_url'=>'/dist/images/icons/aghani.svg'),
            array('name'=>'أفلام عربية','name_en'=>'arabic movies', 'id' => 2, 'color' => 'red', 'photo_url'=>'/dist/images/icons/aflam.svg'),
            array('name'=>'أفلام اجنبية','name_en'=>'english movies', 'id' => 3, 'color' => 'grey1', 'photo_url'=>'/dist/images/icons/aflam.svg'),
            array('name'=>'مسلسلات عربية','name_en'=>'arabic series', 'id' => 4, 'color' => 'green1', 'photo_url'=>'/dist/images/icons/cinema.svg'),
            array('name'=>'مسلسلات اجنبية','name_en'=>'english series', 'id' => 5, 'color' => 'blue', 'photo_url'=>'/dist/images/icons/cinema.svg'),
            array('name'=>'رياضة','name_en'=>'sports', 'id' => 6, 'color' => 'orange', 'photo_url'=>'/dist/images/icons/aghani.svg'),
            array('name'=>'العاب','name_en'=>'games', 'id' => 7, 'color' => 'green2', 'photo_url'=>'/dist/images/icons/al3ab.svg'),
            array('name'=>'برامج','name_en'=>'apps', 'id' => 8, 'color' => 'green3', 'photo_url'=>'/dist/images/icons/brameg.svg'),
            array('name'=>'Tv','name_en'=>'tv', 'id' => 9, 'color' => 'yellow', 'photo_url'=>'/dist/images/icons/tv.svg'),
            array('name'=>'مصارعة','name_en'=>'wwe', 'id' => 10, 'color' => 'grey2', 'photo_url'=>'/dist/images/icons/wwe.png'),
            array('name'=>'منوعات','name_en'=>'other', 'id' => 11, 'color' => 'pink', 'photo_url'=>'/dist/images/icons/okhra.svg')
        ));

        DB::table('metadata')->insert(array(
            array('name' => 'keywords'),
            array('name' => 'description'),
            array('name' => 'scripts'),
            array('name' => 'home_banner')
        ));

        DB::table('roles')->insert(array(
            array('id' => 1 ,'name'=>'super_admin'),
            array('id' => 2 ,'name'=>'admin'),
            array('id' => 3 ,'name'=>'normal')
        ));

        DB::table('role_user')->insert(array(
            array('user_id'=>'1', 'role_id'=> 1),
            array('user_id'=>'1', 'role_id'=> 2)
        ));

        DB::table('users')->insert(
            array('id' => 1 ,'name' => 'developer', 'email' => 'developer@developer.com',
            'password' => bcrypt('developer'))
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->delete();
        DB::table('metadata')->delete();
        DB::table('roles')->delete();
        DB::table('role_user')->delete();
        DB::table('users')->delete();
    }
}
