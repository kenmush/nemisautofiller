<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_can_login_to_nemis()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://nemis.education.go.ke/Login.aspx')
                ->maximize()
                ->type('ctl00$ContentPlaceHolder1$Login1$UserName', 'Gys2')
                ->type('ctl00$ContentPlaceHolder1$Login1$Password', 'welcome')
                ->press('ctl00$ContentPlaceHolder1$Login1$LoginButton')
//                ->mouseover('.MMS')
//                ->clickLink('View My Learners')
                    ->visit("http://nemis.education.go.ke/Learner/Listlearners.aspx")
                ->press('[ ADD NEW STUDENT (WITH BC)]')
                ->waitForReload()
                ->type('ctl00$ContentPlaceHolder1$Surname', 'James')
                ->type('ctl00$ContentPlaceHolder1$FirstName', 'Daniel')
                ->type('ctl00$ContentPlaceHolder1$OtherNames', 'Muthoka')
                ->type('ctl00$ContentPlaceHolder1$Birth_Cert_No', '1021940368')
                ->type('ctl00$ContentPlaceHolder1$DOB$ctl00', '11/29/2004')
                ->select('ctl00$ContentPlaceHolder1$Gender', 'M')
//	<option value="1 ">Baby Class</option>
//	<option value="10">Class 7   </option>
//	<option selected="selected" value="11">Class 8   </option>
//	<option value="16">PP 1</option>
//	<option value="17">PP2</option>
//	<option value="18">Grade 1</option>
//	<option value="19">Grade 2</option>
//	<option value="2 ">Nursery   </option>
//	<option value="20">Grade 3</option>
//	<option value="21">Grade 4</option>
//	<option value="22">Grade 5</option>
//	<option value="23">Grade 6</option>
//	<option value="3 ">Pre Unit  </option>
//	<option value="32">Pre-Vocational</option>
//	<option value="33">Vocational</option>
//	<option value="4 ">Class 1   </option>
//	<option value="5 ">Class 2   </option>
//	<option value="6 ">Class 3   </option>
//	<option value="7 ">Class 4   </option>
//	<option value="8 ">Class 5   </option>
//	<option value="9 ">Class 6   </option>

                ->select('ctl00$ContentPlaceHolder1$ddlClass', '11')
                ->select('ctl00$ContentPlaceHolder1$ddlmedicalcondition', '0')
                ->radio('ctl00$ContentPlaceHolder1$optspecialneed', 'optneedsno')
                ->press('Save Basic Details')
                ->waitForReload()
                ->screenshot()
//                ->clickLink('Contact Details  ')
//                ->type('ctl00$ContentPlaceHolder1$txtMotherIDNo', '')
//                ->type('ctl00$ContentPlaceHolder1$txtMotherName', 'Josephine Mutisya Muthebwa')
//                ->type('ctl00$ContentPlaceHolder1$txtMothersContacts', '')
//                ->type('ctl00$ContentPlaceHolder1$txtFatherIDNO', '')
//                ->type('ctl00$ContentPlaceHolder1$txtFatherName', '')
//                ->type('ctl00$ContentPlaceHolder1$txtFatherContacts', 'Julius Mutisya Muthembwa')
//                ->press('Save Contact Details')
//                ->waitForReload()
                ->pause(7000);


        });

    }

    public function test_can_save_data_to_database()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://nemis.education.go.ke/Login.aspx')
                ->type('ctl00$ContentPlaceHolder1$Login1$UserName', 'Gys2')
                ->type('ctl00$ContentPlaceHolder1$Login1$Password', 'welcome')
                ->press('ctl00$ContentPlaceHolder1$Login1$LoginButton')
                ->mouseover('.MMS')
                ->clickLink('View My Learners')
                ->select('ctl00$ContentPlaceHolder1$SelectCat','18')
                ->select('ctl00$ContentPlaceHolder1$SelectRecs','200')
                ->pause(30000);

            $browser->dump();
        });
    }

}
