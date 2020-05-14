<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MasterModule extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $res = $this->get('/');
        $res->assertStatus(302);
    }

    public function testGetAllPlansForWebsite(){
        $res=$this->get('o3/User/getAllPlansForWebsite',[
            'MS-APP-ID' => 'o3-website',
            'MS-APP-Token'=>\MS\Core\Helper\Comman::encodeLimit('o3-website',120),
            'X-Requested-With'=>'XMLHttpRequest'
            ]);

        $res->assertStatus(200);
    }

    public function testAllSensitiveUrl(){

        $sensitiveUrl=[
            'o3/User/test',
          //  'o3/Panel/home/iYGdemQdmdOptmkQvDQHCNixiaALpnlPPQHnOHcDvbADbvGOtHNHeYoXjkUoXJSuXdHWoNZeMXUbnSJVufatAwORVaMIOMrhpzaKRlyaZecyIuroGvEjOFLNrLcAneWRaGaTGqGzssHjiDiLRQJKZgBNyveujrsvxNuAnqFknCawSRwFPNiBFeXIJqRj',
            'o3/Company/setup/company/get/states'
        ];
        foreach ($sensitiveUrl as  $url){
            $this->get($url)->assertStatus(419);
        }


    }

    public function testNonLogedInPanelRedirect(){
        $sensitiveUrl=[
          //  'o3/User/test',
            'o3/Panel/home',
           // 'o3/Company/setup/company/get/states'
        ];

        foreach ($sensitiveUrl as  $url){
            $this->get($url)->assertStatus(302);
        }
    }

    public function atestSignUpUserFromWebsiteWithMobile(){

        $userData=[
            'ContactNo'=>'9662611234',
            'Email'=>'',
            'FirstName'=>'',
            'LastName'=>'',
            'Password'=>'',
            'Sex'=>'',
            'Username'=>'',
            'type'=>'MS',
            'useMobile'=>true
        ];
        $response = $this->withHeaders([
            'MS-APP-ID' => 'o3-website',
            'MS-APP-Token'=>\MS\Core\Helper\Comman::encodeLimit('o3-website',120),
            'X-Requested-With'=>'XMLHttpRequest'
        ])->json('POST', '/o3/User/signup', $userData);

        //dd($response->dump());
        $response->assertStatus(200)->assertJsonStructure(
            [
                'type',
                'userDetails'=> [
                    'apiToken',
                    'Email',
                    'ContactNo'
                ],
                'status',
                'OTPUniqId'
            ]
        );
        //dd($response);

    }
    public function atestSignUpUserFromWebsiteWithEmail(){

        $userData=[
            'ContactNo'=>'',
            'Email'=>'mitul.a.patel.live@gmail.com',
            'FirstName'=>'',
            'LastName'=>'',
            'Password'=>'',
            'Sex'=>'',
            'Username'=>'',
            'type'=>'MS',
            'useMobile'=>false
        ];
        $response = $this->withHeaders([
            'MS-APP-ID' => 'o3-website',
            'MS-APP-Token'=>\MS\Core\Helper\Comman::encodeLimit('o3-website',120),
            'X-Requested-With'=>'XMLHttpRequest'
        ])->json('POST', '/o3/User/signup', $userData);

        //dd($response->dump());
        $response->assertStatus(200)->assertJsonStructure(
            [
                'type',
                'userDetails'=> [
                    'apiToken',
                    'Email',
                    'ContactNo'
                ],
                'status',
                'OTPUniqId'
            ]
        );
        //dd($response);

    }

}
