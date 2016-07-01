if(! function_exists('encryptPassword')){

	function encryptPassword($user_input){

		$options = [
		    'cost' => 13,
		];

		return password_hash($user_input,PASSWORD_BCRYPT,$options);		

	}

}

if(! function_exists('checkPassword')){

	function checkPassword($user_input, $user_id){

		$CI =& get_instance();
    //Check database for current user hashed password. Table name is user_credential
		$CI->db->where('user_id',$user_id);
		$CI->db->where('status',1);
		$CI->db->where('verified',1);
		$CI->db->select('hash');
		$query = $CI->db->get('user_credential');

		$row = $query->row();
				        	
    	if (isset($row))
		{
			$hash = $row->hash;

			if(crypt($user_input, $hash) == $hash)
			{
				return true;
			}
			else{

				return false;
			}

		}
		else{
		
			return false;
		}

	}

}
