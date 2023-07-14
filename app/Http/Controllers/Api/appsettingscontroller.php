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
        $user1->addRole('student');
        $user2=User::find(2);
        $user2->addRole('manager');
        $user2=User::find(5);
        $user2->addRole('teather');
        $user2=User::find(6);
        $user2->addRole('guardian');
    }
    public function generateIdentity($id=0){
        $identity = identity::find($id==0);
        if(!$identity){
        $identity=new identity();
        $identity->type_identity="جواز ";
        $identity->save();
        $identit=new identity();
        $identit->type_identity="كرت التحصين ";
        $identit->save();
        $identi=new identity();
        $identi->type_identity="بطاقة شخصيه ";
        $identi->save();
        $ident=new identity();
        $ident->type_identity="شهادة ميلاد ";
        $ident->save();
        $iden=new identity();
        $iden->type_identity="بطاقة ضمان ";
        $iden->save();
        $ide=new identity();
        $ide->type_identity="لايوجد ";
        $ide->save();
        return response()->json([
            'message' => 'identity successfully registered','identity' => $identity
            ,$identit,
            $identi,
            $ident,
            $iden,
            $ide,], 201);

        }
        else {
            return response()->json([
                'message' => 'identity Not successfully registered','identity' => null], 400);
        }
    }
    public function generateNationality($id=0){
        $identity = nationality::find($id==0);
        if(!$identity){
        $nationality=new nationality();
        $nationality->name="يمني ";
        $nationality->save();
        $nationalit=new nationality();
        $nationalit->name="سعودي ";
        $nationalit->save();
        $nationali=new nationality();
        $nationali->name="مصري ";
        $nationali->save();
        $national=new nationality();
        $national->name="صومالي ";
        $national->save();
        $nationa=new nationality();
        $nationa->name="سوداني ";
        $nationa->save();
        return response()->json([
            'message' => 'nationality successfully registered','nationality' => $nationality,$nationalit,$nationali,$national,$nationa,], 201);}
        else {
            return response()->json([
                'message' => 'nationality Not successfully registered','nationality' => null], 400);
    }
    }
        public function generateQualification_study($id=0){
            $Qualif = Qualification_study::find($id==0);
            if(!$Qualif){
            $Qualification=new Qualification_study();
            $Qualification->name=" جامعي ";
            $Qualification->save();
            $Qualification_st=new Qualification_study();
            $Qualification_st->name="معهد ";
            $Qualification_st->save();
            $Qualification_s=new Qualification_study();
            $Qualification_s->name="خبره ";
            $Qualification_s->save();
            return response()->json([
                'message' => 'nationality successfully registered','nationality' => $Qualification,$Qualification_st,$Qualification_s], 201);}
            else {
                return response()->json([
                    'message' => 'nationality Not successfully registered','nationality' => null], 400);
        }}
        public function generatejop($id=0){
            $Qualif = job::find($id==0);
            if(!$Qualif){
            $Qualification=new job();
            $Qualification->name=" مدير ";
            $Qualification->save();
            $Qualification_s=new job();
            $Qualification_s->name="معلم ";
            $Qualification_s->save();
            $Qualifica=new job();
            $Qualifica->name="مشرف ";
            $Qualifica->save();
            $Qualif=new job();
            $Qualif->name="موجه ";
            $Qualif->save();

            return response()->json([
                'message' => 'nationality successfully registered','nationality' => $Qualification,$Qualification_s.$Qualifica,$Qualif], 201);}
            else {
                return response()->json([
                    'message' => 'nationality Not successfully registered','nationality' => null], 400);
        }}
        public function generateGender($id=0){
            $gene = gender::find($id==0);
            if(!$gene){
            $gener=new gender();
            $gener->name="ذكر ";
            $gener->save();
            $generateGender=new gender();
            $generateGender->name=" انثى ";
            $generateGender->save();
            return response()->json([
                'message' => 'nationality successfully registered','nationality' => $generateGender,$gener], 201);}
            else {
                return response()->json([
                    'message' => 'nationality Not successfully registered','nationality' => null], 400);
        }}
        public function generateٍٍٍSystem_Spisod($id=0){
            $system = system_episod::find($id==0);
            if(!$system){
            $system_episod=new system_episod();
            $system_episod->name=" تلقين ";
            $system_episod->save();
            $system_e=new system_episod();
            $system_e->name="تسميع ";
            $system_e->save();

            return response()->json([
                'message' => 'nationality successfully registered','nationality' => $system_episod,$system_e], 201);}
            else {
                return response()->json([
                    'message' => 'nationality Not successfully registered','nationality' => null], 400);
        }}
}
