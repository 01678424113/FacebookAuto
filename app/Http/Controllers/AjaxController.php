<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getListGroup($id_category)
    {
        $groups = Group::where('id_category',$id_category)->get();
        $checked = "";
        foreach ($groups as $group){
            if (isset($_POST['checkbox-page'])) {
                foreach ($_POST['checkbox-page'] as $value) {
                    if ($value == $group['id']) {
                        $checked = "checked";
                        break;
                    } else {
                        $checked = "";
                    }
                }
            }
            echo " <div class='checkbox'>
                         <label><input type='checkbox' name='checkbox-page[]' value='".$group->group_id."' ".$checked.">".$group->group_name." - ".$group->group_id."</label>
                   </div>";
        }
    }
}
