<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permission=[
            'viewAny Permission',
            'view Permission',
            'create Permission',
            'update Permission',
            'delete Permission',

            'viewAny Role',
            'view Role',
            'create Role',
            'update Role',
            'delete Role',

            'viewAny Team',
            'view Team',
            'create Team',
            'update Team',
            'delete Team',

            'viewAny User',
            'view User',
            'create User',
            'update User',
            'delete User',

            'viewAny Branch',
            'view Branch',
            'create Branch',
            'update Branch',
            'delete Branch',

            'viewAny ClassEmp',
            'view ClassEmp',
            'create ClassEmp',
            'update ClassEmp',
            'delete ClassEmp',

            'viewAny Company',
            'view Company',
            'create Company',
            'update Company',
            'delete Company',

            'viewAny Grade',
            'view Grade',
            'create Grade',
            'update Grade',
            'delete Grade',

            'viewAny JobPosition',
            'view JobPosition',
            'create JobPosition',
            'update JobPosition',
            'delete JobPosition',

            'viewAny Organization',
            'view Organization',
            'create Organization',
            'update Organization',
            'delete Organization',
        ];
        $insertPermission=[];
        foreach ($permission as $key) {
            array_push($insertPermission, [
                "name"=>$key,
                "description"=>'This is permission for function '.$key
            ]);
        }
        \App\Models\Config\Permission::insert($insertPermission);
        \App\Models\Config\Role::create([
            'name'=>'Superadmin',
            'description'=>'for development only.'
        ]);
        \App\Models\User::factory()->create([
            'role_id'=>1,
            'name'=>'Super admin',
            'email'=>'superadmin@ptsas.tes',
            'password'=>bcrypt('123456'),
            'mobile_phone'=>'8234872349',
            'phone'=>'3253245423',
            'placebirth'=>'lorem',
            'birthdate'=>Date('Y-m-d'),
            'gender'=>'male',
            'bloodtype'=>'A',
            'religion'=>'Islam',
            'identity_address'=>'KTP',
            'identity_numbers'=>'872349823473487',
            'identity_expired'=>Date('Y-m-d'),
            'postal_code'=>'234234',
            'citizen_idaddress'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'recidential_address'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
    }
}
