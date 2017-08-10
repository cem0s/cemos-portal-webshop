<?php

namespace App;


class Common 
{

	public function checkIfAdmin()
    {
        $types = session('user_type');
        if(!empty($types)) {
            foreach ($types as $key => $value) {
                if(strtolower($value)=="admin") {
                    return true;
                }
            }
        }
        return false;
    }

    public function checkIfRealtorAdmin()
    {
        $groupId = session('group_id');
        if($groupId == 1){
            return true;
        }
        return false;
    }


}

?>