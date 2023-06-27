<?php

namespace App\Http\Controllers\api;

use App\Models\Role;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class appsettingscontroller extends Controller
{
    public function generateRoles(){
        $super_admin=new Role();
        $super_admin->name="super_admin";
        $super_admin->display_name='site admin';
        $super_admin->description='this role allow user';
        $super_admin->save();

        $manager=new Role();
        $manager->name="manager";
        $manager->display_name='site manager';
        $manager->description='manage only articles and comments';
        $manager->save();

        $user=new Role();
        $user->name="user";
        $user->display_name='site user';
        $user->description='this role  user';
        $user->save();
    }
    public function updeteUserRole(){
        $user1=User::find(1);
        $user1->addRole('super_admin');
        $user2=User::find(2);
        $user2->addRole('manager');
    }
}
