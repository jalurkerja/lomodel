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
		$arr[$l]["yes"] 										= "Yes";
		$arr[$l]["no"] 											= "No";
		$arr[$l]["cancel"] 										= "Cancel";
		$arr[$l]["at"] 											= "at";
		$arr[$l]["send"] 										= "send";
		$arr[$l]["more"] 										= "More";
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
		$arr[$l]["post_a_job"]									= "Post a job";
		$arr[$l]["agencies"]									= "Agencies";
		$arr[$l]["signup"]										= "Sign Up";
		$arr[$l]["signin"]										= "Sign In";
		$arr[$l]["my_dashboard"]								= "My Dashboard";
		$arr[$l]["dashboard"]									= "Dashboard";
		$arr[$l]["back_to_dashboard"]							= "Back to Dashboard";
		$arr[$l]["personal"]									= "Personal";
		$arr[$l]["agency"]										= "Agency";
		$arr[$l]["agency_details"]								= "Agency Details";
		$arr[$l]["corporate"]									= "Corporate";
		$arr[$l]["model"]										= "Model";
		$arr[$l]["models"]										= "Models";
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
		$arr[$l]["profile"]										= "Profile";
		$arr[$l]["albums"]										= "Albums";
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
		$arr[$l]["change_logo"]									= "Change Logo";
		$arr[$l]["change_corporate_logo"]						= "Change Corporate Logo";
		$arr[$l]["setup_your_profile_photo"]					= "Setup Your Profile Photo";
		$arr[$l]["setup_your_corporate_logo"]					= "Setup Your Corporate Logo";
		$arr[$l]["edit_profile"]								= "Edit Profile";
		$arr[$l]["create_album"]								= "Create Album";
		$arr[$l]["create_new_album"]							= "Create New Album";
		$arr[$l]["album_name"]									= "Album Name";
		$arr[$l]["add_photo"]									= "Add Photo";
		$arr[$l]["finish"]										= "Finish";
		$arr[$l]["gallery"]										= "Gallery";
		$arr[$l]["create_gallery"]								= "Create Gallery";
		$arr[$l]["create_new_gallery"]							= "Create New Gallery";
		$arr[$l]["gallery_name"]								= "Gallery Name";
		$arr[$l]["location"]									= "Location";
		$arr[$l]["save"]										= "Save";
		$arr[$l]["profile_updated_successfully"]				= "Profile updated successfully";
		$arr[$l]["are_you_sure_you_want_to_delete_this_photo"]	= "Are you sure you want to delete this photo?";
		$arr[$l]["notification_success_model_apply_job"]		= "Casting {jobsTitle} has been applied by {modelName}";
		$arr[$l]["jobs"]										= "Jobs";
		$arr[$l]["model_applicants"]							= "Model Applicants";
		$arr[$l]["applied_jobs"]								= "Applied Jobs";
		$arr[$l]["job_offers"]									= "Job Offers";
		$arr[$l]["bookings"]									= "Bookings";
		$arr[$l]["booking_proposal"]							= "Booking Proposal";
		$arr[$l]["invoices"]									= "Invoices";
		$arr[$l]["tokens"]										= "Tokens";
		$arr[$l]["idcard"]										= "ID Card";
		$arr[$l]["data_not_found"]								= "Data not found";
		$arr[$l]["message_not_found"]							= "Message not found";
		$arr[$l]["already_member"]								= "Already Member";
		$arr[$l]["join_requests"]								= "Join Requests";
		$arr[$l]["requests_to_join"]							= "Request To Join";
		$arr[$l]["join_offers"]									= "Join Offers";
		$arr[$l]["joined"]										= "Joined";
		$arr[$l]["waiting_for_join_approval"]					= "Waiting for join approval";
		$arr[$l]["model_already_joined_agency"]					= "{modelName} already joined with {agencyName}";
		$arr[$l]["new"]											= "New";
		$arr[$l]["accept"]										= "Accept";
		$arr[$l]["accept_join"]									= "Accept Join";
		$arr[$l]["accepted"]									= "Accepted";
		$arr[$l]["reject"]										= "Reject";
		$arr[$l]["reject_join"]									= "Reject Join";
		$arr[$l]["rejected"]									= "Rejected";
		$arr[$l]["join_rejected"]								= "Join Rejected";
		$arr[$l]["confirm_message_accept_join_request"]			= "Are you sure want to accept him/her to be your model member?";
		$arr[$l]["confirm_message_reject_join_request"]			= "Are you sure want to reject him/her to be your model member?";
		$arr[$l]["success_message_accept_join_request"]			= "You have just accepted {modelName} as a member of your model";
		$arr[$l]["success_message_reject_join_request"]			= "You have just rejected {modelName} as a member of your model";
		$arr[$l]["success_message_post_a_job"]					= "Posting a job successfully saved, please wait for publishing process from us";
		$arr[$l]["confirm_message_delete_a_job"]				= "Are You sure want to delete this job posting?";
		$arr[$l]["success_message_delete_job"]					= "Job posting successfully deleted";
		$arr[$l]["message_join_request"]						= "{modelName} wants to join with you, <a href=\"dashboard.php?tabActive=models&subtabActive=joinRequests\">click here</a> to get more detail info.";
		$arr[$l]["message_join_request_sent"]					= "your join request has been sent to {agencyName}";
		$arr[$l]["message_join_offer"]							= "{agencyName} wants you to join, <a href=\"dashboard.php?tabActive=joinOffers\">click here</a> to get more detail info.";
		$arr[$l]["message_join_offer_sent"]						= "your join offer has been sent to {modelName}";
		$arr[$l]["gender"]										= "Gender";
		$arr[$l]["applicants"]									= "Applicants";
		$arr[$l]["you_have_to_login_as_a_model"]				= "You have to registered/log in as a model";
		$arr[$l]["you_have_to_registered_as_a_agency_or_corporate"]	= "You have to registered as Agency or Corporate";
		$arr[$l]["you_have_to_registered_as_a_agency"]			= "You have to registered as Agency";
		$arr[$l]["are_you_sure_want_to_join_to_this_agency"]	= "Are you sure want to join to this agency";
		$arr[$l]["are_you_sure_want_to_offer_this_model_to_join"]= "Are you sure want to offer this model to join";
		$arr[$l]["you_have_to_login_first"]						= "You have to log in first";
		$arr[$l]["notification_booking_proposal"]				= "{agencyName} mengirimkan booking proposal ke {modelName}";
		$arr[$l]["this_model_has_asked_to_join_with_you"]		= "This model has asked to join with you";
		
		/*==================================================================================================================================*/
		/*==================================================================================================================================*/
		$l = "id";
		$arr[$l]["yes"] 										= "Ya";
		$arr[$l]["no"] 											= "Tidak";
		$arr[$l]["cancel"] 										= "Batal";
		$arr[$l]["at"] 											= "pada";
		$arr[$l]["send"] 										= "kirim";
		$arr[$l]["more"] 										= "Lihat Lebih";
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
		$arr[$l]["post_a_job"]									= "Pasang Lowongan";
		$arr[$l]["agencies"]									= "Agensi";
		$arr[$l]["signup"]										= "Daftar";
		$arr[$l]["signin"]										= "Masuk";
		$arr[$l]["my_dashboard"]								= "Dasbor Saya";
		$arr[$l]["dashboard"]									= "Dasbor";
		$arr[$l]["back_to_dashboard"]							= "Kembali Ke Dasbor";
		$arr[$l]["personal"]									= "Pribadi";
		$arr[$l]["agency"]										= "Agensi";
		$arr[$l]["agency_details"]								= "Detail Agensi";
		$arr[$l]["corporate"]									= "Perusahaan";
		$arr[$l]["model"]										= "Model";
		$arr[$l]["models"]										= "Model";
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
		$arr[$l]["profile"]										= "Profil";
		$arr[$l]["albums"]										= "Album";
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
		$arr[$l]["change_logo"]									= "Change Logo";
		$arr[$l]["change_corporate_logo"]						= "Change Corporate Logo";
		$arr[$l]["setup_your_profile_photo"]					= "Atur Foto Profil Anda";
		$arr[$l]["setup_your_corporate_logo"]					= "Atur Logo Perusahaan Anda";
		$arr[$l]["edit_profile"]								= "Ubah Profil";
		$arr[$l]["create_album"]								= "Buat Album";
		$arr[$l]["create_new_album"]							= "Buat Album Baru";
		$arr[$l]["album_name"]									= "Nama Album";
		$arr[$l]["add_photo"]									= "Tambah Photo";
		$arr[$l]["finish"]										= "Selesai";
		$arr[$l]["gallery"]										= "Galeri";
		$arr[$l]["create_gallery"]								= "Buat Galeri";
		$arr[$l]["create_new_gallery"]							= "Buat Galeri Baru";
		$arr[$l]["gallery_name"]								= "Nama Galeri";
		$arr[$l]["location"]									= "Lokasi";
		$arr[$l]["save"]										= "Simpan";
		$arr[$l]["profile_updated_successfully"]				= "Profil berhasil diubah";
		$arr[$l]["are_you_sure_you_want_to_delete_this_photo"]	= "Anda yakin akan menghapus foto ini?";
		$arr[$l]["notification_success_model_apply_job"]		= "Lowongan casting {jobsTitle} telah dilamar oleh {modelName}";
		$arr[$l]["jobs"]										= "Pekerjaan";
		$arr[$l]["model_applicants"]							= "Lamaran Model";
		$arr[$l]["applied_jobs"]								= "Pekerjaan yg dilamar";
		$arr[$l]["job_offers"]									= "Tawaran Pekerjaan";
		$arr[$l]["bookings"]									= "Booking";
		$arr[$l]["booking_proposal"]							= "Proposal Booking";
		$arr[$l]["invoices"]									= "Invoice";
		$arr[$l]["tokens"]										= "Token";
		$arr[$l]["idcard"]										= "No Identitas";
		$arr[$l]["data_not_found"]								= "Data tidak ditemukan";
		$arr[$l]["message_not_found"]							= "Pesan tidak ditemukan";
		$arr[$l]["already_member"]								= "Sudah Menjadi Anggota";
		$arr[$l]["join_requests"]								= "Permintaan Bergabung";
		$arr[$l]["requests_to_join"]							= "Meminta untuk bergabung";
		$arr[$l]["join_offers"]									= "Tawaran Bergabung";
		$arr[$l]["joined"]										= "Telah Bergabung";
		$arr[$l]["waiting_for_join_approval"]					= "Menunggu persetujuan untuk bergabung";
		$arr[$l]["model_already_joined_agency"]					= "{modelName} telah bergabung dengan {agencyName}";
		$arr[$l]["new"]											= "Baru";
		$arr[$l]["accept"]										= "Terima";
		$arr[$l]["accept_join"]									= "Terima Bergabung";
		$arr[$l]["accepted"]									= "Diterima";
		$arr[$l]["reject"]										= "Tolak";
		$arr[$l]["reject_join"]									= "Tolak Bergabung";
		$arr[$l]["rejected"]									= "Ditolak";
		$arr[$l]["join_rejected"]								= "Bergabung ditolak";
		$arr[$l]["confirm_message_accept_join_request"]			= "Anda yakin untuk menerima dia sebagai anggota model Anda?";
		$arr[$l]["confirm_message_reject_join_request"]			= "Anda yakin untuk menolak dia sebagai anggota model Anda?";
		$arr[$l]["success_message_accept_join_request"]			= "Anda baru saja menerima {modelName} sebagai anggota model Anda";
		$arr[$l]["success_message_reject_join_request"]			= "Anda baru saja menolak {modelName} sebagai anggota model Anda";
		$arr[$l]["success_message_post_a_job"]					= "Posting pekerjaan berhasil, silakan tunggu proses publikasi dari Kami";
		$arr[$l]["confirm_message_delete_a_job"]				= "Anda yakin akan menghapus lowongan pekerjaan ini?";
		$arr[$l]["success_message_delete_job"]					= "Pengahapusan lowongan pekerjaan berhasil";
		$arr[$l]["message_join_request"]						= "{modelName} ingin bergabung dengan Anda, <a href=\"dashboard.php?tabActive=models&subtabActive=joinRequests\">klik disini</a> untuk melihat lebih detail.";
		$arr[$l]["message_join_request_sent"]					= "Permintaan bergabung Anda telah di kirim ke {agencyName}";
		$arr[$l]["message_join_offer"]							= "{agencyName} menginginkan Anda untuk bergabung, <a href=\"dashboard.php?tabActive=joinOffers\">click here</a> to get more detail info.";
		$arr[$l]["message_join_offer_sent"]						= "Penawaran bergabung Anda telah di kirim ke {modelName}";
		$arr[$l]["gender"]										= "Jenis Kelamin";
		$arr[$l]["applicants"]									= "Pelamar";
		$arr[$l]["you_have_to_login_as_a_model"]				= "Anda harus login/terdaftar sebagai model";
		$arr[$l]["you_have_to_registered_as_a_agency_or_corporate"]	= "Anda harus terdaftar sebagai Agensi atau Corporate";
		$arr[$l]["you_have_to_registered_as_a_agency"]			= "Anda harus terdaftar sebagai Agensi";
		$arr[$l]["are_you_sure_want_to_join_to_this_agency"]	= "Anda yakin ingin bergabung dengan agency ini";
		$arr[$l]["are_you_sure_want_to_offer_this_model_to_join"]= "Anda yakin ingin mengajak model ini untuk bergabung";
		$arr[$l]["you_have_to_login_first"]						= "Anda harus login terlebih dahulu";
		$arr[$l]["notification_booking_proposal"]				= "{agencyName} mengirimkan booking proposal ke {modelName}";
		$arr[$l]["this_model_has_asked_to_join_with_you"]		= "Model ini telah meminta untuk bergabung dengan Anda";
		
		return $arr[$this->locale][$index];
	}
}
?>
