<?php 
# @*************************************************************************@
# @ @author Mansur Altamirov (Mansur_TL)                                    @
# @ @author_url 1: https://www.instagram.com/mansur_tl                      @
# @ @author_url 2: http://codecanyon.net/user/mansur_tl                     @
# @ @author_email: highexpresstore@gmail.com                                @
# @*************************************************************************@
# @ ColibriSM - The Ultimate Modern Social Media Sharing Platform           @
# @ Copyright (c) 21.03.2020 ColibriSM. All rights reserved.                @
# @*************************************************************************@

if ($action == 'load_more') {
    $data['err_code'] = "invalid_req_data";
    $data['status']   = 400;
    $offset           = fetch_or_get($_GET['offset'], 0);
    $users_list       = array();
    $html_arr         = array();

    if (is_posnum($offset)) {
        
        $users_list = cl_get_hot_topics(30, $offset);

        if (not_empty($users_list)) {
            foreach ($users_list as $cl['li']) {
                $html_arr[] = cl_template('trending/includes/list_item');
            }

            $data['status'] = 200;
            $data['html']   = implode("", $html_arr);
        }
    }
}