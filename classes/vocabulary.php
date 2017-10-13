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
		$arr[$l]["discover_models_or_be_discovered"]		= "Discover models or be discovered";
		$arr[$l]["the_easier_way_to_find_models"]			= "The easier way to find models";
		$arr[$l]["im_a_model"]								= "I'm A Model";
		$arr[$l]["im_looking_models"]						= "I'm Looking For Models";
		$arr[$l]["news"]									= "News";
		$arr[$l]["models"]									= "Models";
		$arr[$l]["show_all"]								= "Show All";
		$arr[$l]["castings"]								= "Castings";
		$arr[$l]["see_all_castings"]						= "See All Castings";
		$arr[$l]["post_casting"]							= "Post Casting";
		$arr[$l]["agencies"]								= "Agencies";
		$arr[$l]["signup"]									= "Sign Up";
		$arr[$l]["signin"]									= "Sign In";
		$arr[$l]["my_dasboard"]								= "My Dashboard";
		$arr[$l]["personal"]								= "Personal";
		$arr[$l]["agency"]									= "Agency";
		$arr[$l]["corporate"]								= "Corporate";
		$arr[$l]["model"]									= "Model";
		$arr[$l]["personal_description"]					= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["agency_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["corporate_description"]					= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["model_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["signin_success"]							= "Sign In Success";
		$arr[$l]["error_wrong_username_password"]			= "Sign In failed, wrong username and/or password, Please try again!";
		$arr[$l]["connect_socially_with_us"]				= "Connect socially with us";
		$arr[$l]["links"]									= "Links";
		$arr[$l]["contact_us"]								= "Contact Us";
		$arr[$l]["about"]									= "About";
		$arr[$l]["contact"]									= "Contact";
		
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
		$arr[$l]["discover_models_or_be_discovered"]		= "Discover models or be discovered";
		$arr[$l]["the_easier_way_to_find_models"]			= "Cara mudah mencari model";
		$arr[$l]["im_a_model"]								= "Saya Seorang Model";
		$arr[$l]["im_looking_models"]						= "Saya Mencari Model";
		$arr[$l]["news"]									= "Berita";
		$arr[$l]["models"]									= "Model";
		$arr[$l]["show_all"]								= "Lihat Semua";
		$arr[$l]["castings"]								= "Casting";
		$arr[$l]["see_all_castings"]						= "Lihat Semua Casting";
		$arr[$l]["post_casting"]							= "Pasang Casting";
		$arr[$l]["agencies"]								= "Agensi";
		$arr[$l]["signup"]									= "Daftar";
		$arr[$l]["signin"]									= "Masuk";
		$arr[$l]["my_dasboard"]								= "Dasbor Saya";
		$arr[$l]["personal"]								= "Pribadi";
		$arr[$l]["agency"]									= "Agensi";
		$arr[$l]["corporate"]								= "Perusahaan";
		$arr[$l]["model"]									= "Model";
		$arr[$l]["personal_description"]					= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["agency_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["corporate_description"]					= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["model_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["signin_success"]							= "Anda berhasil masuk";
		$arr[$l]["error_wrong_username_password"]			= "Anda gagal masuk, username dan/atau password salah, Silakan ulangi lagi!";
		$arr[$l]["connect_socially_with_us"]				= "Terhubung media sosial dengan kami";
		$arr[$l]["links"]									= "Link";
		$arr[$l]["contact_us"]								= "Hubungi Kami";
		$arr[$l]["about"]									= "Tentang Kami";
		$arr[$l]["contact"]									= "Hubungi";
		
		return $arr[$this->locale][$index];
	}
}
?>
