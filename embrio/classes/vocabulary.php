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
		$arr[$l]["hello"] 										= "Hello";
		$arr[$l]["username"] 									= "Username";
		$arr[$l]["signin"] 										= "Sign In";
		$arr[$l]["signout"] 									= "Sign Out";
		$arr[$l]["signup"] 										= "Sign Up";
		$arr[$l]["starts_here"] 								= "Your Journey Starts Here";
		$arr[$l]["fullname"]	 								= "Full Name";
		$arr[$l]["email"]	 									= "E-mail";
		$arr[$l]["address"]										= "Address";
		$arr[$l]["email_address"]								= "E-mail Address";
		$arr[$l]["password"]									= "Password";
		$arr[$l]["repassword"]									= "Retype Password";
		$arr[$l]["minimum_6_characters"]						= "Minimum 6 characters";
		$arr[$l]["password_error"]								= "Password Invalid";
		$arr[$l]["email_invalid"]								= "Email Invalid";
		$arr[$l]["range_characters"]							= "6-8 characters";
		$arr[$l]["by_signing_up_i_agree_to"]					= "By Signing Up, I agree to karir's";
		$arr[$l]["terms_and_conditions"]						= "Terms and Conditions";
		$arr[$l]["and"]											= "and";
		$arr[$l]["or"]											= "or";
		$arr[$l]["privacy_policy"]								= "Privacy Policy";
		$arr[$l]["keyword"]										= "Keyword";
		$arr[$l]["discover_models_or_be_discovered"]			= "Discover models or be discovered";
		$arr[$l]["the_easier_way_to_find_models"]				= "The easier way to find models";
		$arr[$l]["im_a_model"]									= "I'm A Model";
		$arr[$l]["im_looking_models"]							= "I'm Looking For Models";
		$arr[$l]["news"]										= "News";
		$arr[$l]["models"]										= "Models";
		$arr[$l]["show_all"]									= "Show All";
		$arr[$l]["castings"]									= "Castings";
		$arr[$l]["see_all_castings"]							= "See All Castings";
		$arr[$l]["post_casting"]								= "Post Casting";
		$arr[$l]["agencies"]									= "Agencies";
		$arr[$l]["signup"]										= "Sign Up";
		$arr[$l]["signin"]										= "Sign In";
		$arr[$l]["my_dashboard"]								= "My Dashboard";
		$arr[$l]["dashboard"]									= "Dashboard";
		$arr[$l]["back_to_dashboard"]							= "Back to Dashboard";
		$arr[$l]["personal"]									= "Personal";
		$arr[$l]["agency"]										= "Agency";
		$arr[$l]["corporate"]									= "Corporate";
		$arr[$l]["model"]										= "Model";
		$arr[$l]["personal_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["agency_description"]							= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["corporate_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["model_description"]							= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["signin_success"]								= "Sign In Success";
		$arr[$l]["error_wrong_username_password"]				= "Sign In failed, wrong username and/or password, Please try again!";
		$arr[$l]["connect_socially_with_us"]					= "Connect socially with us";
		$arr[$l]["links"]										= "Links";
		$arr[$l]["contact_us"]									= "Contact Us";
		$arr[$l]["about"]										= "About";
		$arr[$l]["contact"]										= "Contact";
		$arr[$l]["message"]										= "Message";
		$arr[$l]["register_as"]									= "Register as";
		$arr[$l]["modeling_for_everyone"]						= "MODELING FOR EVERYONE";
		$arr[$l]["nationality"]									= "Nationality";
		$arr[$l]["hair_color"]									= "Hair Color";
		$arr[$l]["eye_color"]									= "Eye Color";
		$arr[$l]["height"]										= "Height";
		$arr[$l]["chest_size"]									= "Chest";
		$arr[$l]["bust_size"]									= "Bust (uk)";
		$arr[$l]["waist_size"]									= "Waist";
		$arr[$l]["hips_size"]									= "Hips";
		$arr[$l]["shoe_size"]									= "Shoe (euro)";
		$arr[$l]["model_category"]								= "Model Category";
		$arr[$l]["change_photo"]								= "Change Photo";
		$arr[$l]["change_profile_photo"]						= "Change Profile Photo";
		$arr[$l]["setup_your_profile_photo"]					= "Setup Your Profile Photo";
		$arr[$l]["edit_profile"]								= "Edit Profile";
		$arr[$l]["create_album"]								= "Create Album";
		$arr[$l]["create_new_album"]							= "Create New Album";
		$arr[$l]["album_name"]									= "Album Name";
		$arr[$l]["add_photo"]									= "Add Photo";
		$arr[$l]["finish"]										= "Finish";
		$arr[$l]["location"]									= "Location";
		$arr[$l]["save"]										= "Save";
		$arr[$l]["profile_updated_successfully"]				= "Profile updated successfully";
		$arr[$l]["are_you_sure_you_want_to_delete_this_photo"]	= "Are you sure you want to delete this photo?";
		$arr[$l]["notification_success_model_apply_job"]		= "Casting {jobsTitle} has been applied by {modelName}";
		
		/*==================================================================================================================================*/
		/*==================================================================================================================================*/
		$l = "id";
		$arr[$l]["hello"] 										= "Halo";
		$arr[$l]["username"] 									= "Username";
		$arr[$l]["signin"] 										= "Masuk";
		$arr[$l]["signout"] 									= "Keluar";
		$arr[$l]["signup"] 										= "Daftar";
		$arr[$l]["starts_here"] 								= "Perjalanan Anda dimulai disini";
		$arr[$l]["fullname"]	 								= "Nama Lengkap";
		$arr[$l]["email"]	 									= "E-mail";
		$arr[$l]["address"]										= "Alamat";
		$arr[$l]["email_address"]								= "Alamat Email";
		$arr[$l]["password"]									= "Kata Sandi";
		$arr[$l]["repassword"]									= "Ketik Ulang Kata Sandi";
		$arr[$l]["minimum_6_characters"]						= "Minimal 6 karakter";
		$arr[$l]["password_error"]								= "Kesalahan pada Kata Sandi";
		$arr[$l]["email_invalid"]								= "Kesalahan pada email";
		$arr[$l]["range_characters"]							= "6-8 Karakter";
		$arr[$l]["by_signing_up_i_agree_to"]					= "Dengan mendaftar berarti Saya telah menyetujui";
		$arr[$l]["terms_and_conditions"]						= "Syarat dan Ketentuan";
		$arr[$l]["and"]											= "dan";
		$arr[$l]["or"]											= "atau";
		$arr[$l]["privacy_policy"]								= "Polis kerahasiaan";
		$arr[$l]["keyword"]										= "Kata Kunci";
		$arr[$l]["discover_models_or_be_discovered"]			= "Discover models or be discovered";
		$arr[$l]["the_easier_way_to_find_models"]				= "Cara mudah mencari model";
		$arr[$l]["im_a_model"]									= "Saya Seorang Model";
		$arr[$l]["im_looking_models"]							= "Saya Mencari Model";
		$arr[$l]["news"]										= "Berita";
		$arr[$l]["models"]										= "Model";
		$arr[$l]["show_all"]									= "Lihat Semua";
		$arr[$l]["castings"]									= "Casting";
		$arr[$l]["see_all_castings"]							= "Lihat Semua Casting";
		$arr[$l]["post_casting"]								= "Pasang Casting";
		$arr[$l]["agencies"]									= "Agensi";
		$arr[$l]["signup"]										= "Daftar";
		$arr[$l]["signin"]										= "Masuk";
		$arr[$l]["my_dashboard"]								= "Dasbor Saya";
		$arr[$l]["dashboard"]									= "Dasbor";
		$arr[$l]["back_to_dashboard"]							= "Kembali Ke Dasbor";
		$arr[$l]["personal"]									= "Pribadi";
		$arr[$l]["agency"]										= "Agensi";
		$arr[$l]["corporate"]									= "Perusahaan";
		$arr[$l]["model"]										= "Model";
		$arr[$l]["personal_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["agency_description"]							= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["corporate_description"]						= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["model_description"]							= "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
		$arr[$l]["signin_success"]								= "Anda berhasil masuk";
		$arr[$l]["error_wrong_username_password"]				= "Anda gagal masuk, username dan/atau password salah, Silakan ulangi lagi!";
		$arr[$l]["connect_socially_with_us"]					= "Terhubung media sosial dengan kami";
		$arr[$l]["links"]										= "Link";
		$arr[$l]["contact_us"]									= "Hubungi Kami";
		$arr[$l]["about"]										= "Tentang Kami";
		$arr[$l]["contact"]										= "Hubungi";
		$arr[$l]["message"]										= "Pesan";
		$arr[$l]["register_as"]									= "Daftar sebagai";
		$arr[$l]["modeling_for_everyone"]						= "MODELING UNTUK SEMUA ORANG";
		$arr[$l]["nationality"]									= "Kebangsaan";
		$arr[$l]["hair_color"]									= "Warna Rambut";
		$arr[$l]["eye_color"]									= "Warna Bola Mata";
		$arr[$l]["height"]										= "Tinggi";
		$arr[$l]["chest_size"]									= "Lingkar Dada";
		$arr[$l]["bust_size"]									= "Ukuran Bra (uk)";
		$arr[$l]["waist_size"]									= "Lingkar Pinggang";
		$arr[$l]["hips_size"]									= "lingkar Pinggul";
		$arr[$l]["shoe_size"]									= "Ukuran Sepatu (euro)";
		$arr[$l]["model_category"]								= "Kategori Model";
		$arr[$l]["change_photo"]								= "Ubah Foto";
		$arr[$l]["change_profile_photo"]						= "Ubah Foto Profil";
		$arr[$l]["setup_your_profile_photo"]					= "Atur Foto Profil Anda";
		$arr[$l]["edit_profile"]								= "Ubah Profil";
		$arr[$l]["create_album"]								= "Buat Album";
		$arr[$l]["create_new_album"]							= "Buat Album Baru";
		$arr[$l]["album_name"]									= "Nama Album";
		$arr[$l]["add_photo"]									= "Tambah Photo";
		$arr[$l]["finish"]										= "Selesai";
		$arr[$l]["location"]									= "Lokasi";
		$arr[$l]["save"]										= "Simpan";
		$arr[$l]["profile_updated_successfully"]				= "Profil berhasil diubah";
		$arr[$l]["are_you_sure_you_want_to_delete_this_photo"]	= "Anda yakin akan menghapus foto ini?";
		$arr[$l]["notification_success_model_apply_job"]		= "Lowongan casting {jobsTitle} telah dilamar oleh {modelName}";
		
		return $arr[$this->locale][$index];
	}
}
?>
