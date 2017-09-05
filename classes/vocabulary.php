<?php
class Vocabulary{
	protected $locale;
	public function __construct($locale){
		$this->locale = $locale;
	}
	
	public function capitalize($words){
		$words = strtolower($words);
		$arr = explode(" ",$words);
		$return = "";
		foreach($arr as $word){ $return .= strtoupper(substr($word,0,1)).substr($word,1)." "; }
		return $return;
	}
	
	public function w($index){ return $this->words($index); }
	
	public function words($index){
		$l = "en";
		$arr[$l]["hello"] 									= "Hello";
		$arr[$l]["username"] 								= "Username";
		$arr[$l]["signin"] 									= "Sign In";
		$arr[$l]["signout"] 								= "Sign Out";
		$arr[$l]["signup"] 									= "Sign Up";
		$arr[$l]["starts_here"] 							= "Your Journey Starts Here";
		$arr[$l]["fullname"]	 							= "Full Name";
		$arr[$l]["email"]	 								= "E-mail";
		$arr[$l]["address"]									= "Address";
		$arr[$l]["email_address"]							= "E-mail Address";
		$arr[$l]["password"]								= "Password";
		$arr[$l]["repassword"]								= "Retype Password";
		$arr[$l]["minimum_6_characters"]					= "Minimum 6 characters";
		$arr[$l]["password_error"]							= "Password Invalid";
		$arr[$l]["email_invalid"]							= "Email Invalid";
		$arr[$l]["range_characters"]						= "6-8 characters";
		$arr[$l]["by_signing_up_i_agree_to"]				= "By Signing Up, I agree to karir's";
		$arr[$l]["terms_and_conditions"]					= "Terms and Conditions";
		$arr[$l]["and"]										= "and";
		$arr[$l]["or"]										= "or";
		$arr[$l]["privacy_policy"]							= "Privacy Policy";
		$arr[$l]["keyword"]									= "Keyword";
		
		/*==================================================================================================================================*/
		/*==================================================================================================================================*/
		$l = "id";
		$arr[$l]["hello"] 									= "Halo";
		$arr[$l]["username"] 								= "Username";
		$arr[$l]["signin"] 									= "Masuk";
		$arr[$l]["signout"] 								= "Keluar";
		$arr[$l]["signup"] 									= "Daftar";
		$arr[$l]["starts_here"] 							= "Perjalanan Anda dimulai disini";
		$arr[$l]["fullname"]	 							= "Nama Lengkap";
		$arr[$l]["email"]	 								= "E-mail";
		$arr[$l]["address"]									= "Alamat";
		$arr[$l]["email_address"]							= "Alamat Email";
		$arr[$l]["password"]								= "Kata Sandi";
		$arr[$l]["repassword"]								= "Ketik Ulang Kata Sandi";
		$arr[$l]["minimum_6_characters"]					= "Minimal 6 karakter";
		$arr[$l]["password_error"]							= "Kesalahan pada Kata Sandi";
		$arr[$l]["email_invalid"]							= "Kesalahan pada email";
		$arr[$l]["range_characters"]						= "6-8 Karakter";
		$arr[$l]["by_signing_up_i_agree_to"]				= "Dengan mendaftar berarti Saya telah menyetujui";
		$arr[$l]["terms_and_conditions"]					= "Syarat dan Ketentuan";
		$arr[$l]["and"]										= "dan";
		$arr[$l]["or"]										= "atau";
		$arr[$l]["privacy_policy"]							= "Polis kerahasiaan";
		$arr[$l]["keyword"]									= "Kata Kunci";
		
		return $arr[$this->locale][$index];
	}
}
?>
