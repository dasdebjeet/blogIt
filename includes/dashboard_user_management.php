<script src="./js/dashboard_user_management.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<div class="dashboard_userMgnt_con">
    <div class="dashboard_userMgnt_wrap">
        <div class="dashboard_userMgnt_title">User Summary</div>


        <div class="dashboard_userMgnt_seachbar_con flexc">
            <div class="dashboard_userMgnt_seachbar_wrap">
                <div class="seachbar_wrap_title">What are you looking for?</div>
                <div class="dashboard_userMgnt_seachbar flexc">
                    <div class="userMgnt_seachbar_icon flexc"><i class="bx bx-search"></i></div>
                    <input class="userMgnt_seachbar_input" type="text" placeholder="search by user name, role, status">
                </div>
            </div>


            <div class="dashboard_userMgnt_seachbar_role_filter_wrap">
                <div class="seachbar_role_filter_wrap_title">Role</div>
                <div class="dashboard_userMgnt_seachbar_role_filter">
                    <div class="dashboard_userMgnt_seachbar_role_filter_current flexc" tabindex="1">
                        <div class="dashboard_userMgnt_seachbar_role_filter_value flexc">
                            <input class="dashboard_userMgnt_seachbar_role_filter_input" type="radio" id="userMgnt_inpRole_admin" value="admin" name="userMgnt_inpRole_val" checked="checked" />
                            <p class="dashboard_userMgnt_seachbar_role_filter_input_text flexc">Admin</p>
                        </div>
                        <div class="dashboard_userMgnt_seachbar_role_filter_value flexc">
                            <input class="dashboard_userMgnt_seachbar_role_filter_input" type="radio" id="userMgnt_inpRole_contributor" value="contributor" name="userMgnt_inpRole_val" checked="checked" />
                            <p class="dashboard_userMgnt_seachbar_role_filter_input_text flexc">Contributor</p>
                        </div>
                        <div class="dashboard_userMgnt_seachbar_role_filter_value flexc">
                            <input class="dashboard_userMgnt_seachbar_role_filter_input" type="radio" id="userMgnt_inpRole_newbie" value="newbie" name="userMgnt_inpRole_val" checked="checked" />
                            <p class="dashboard_userMgnt_seachbar_role_filter_input_text flexc">Newbie</p>
                        </div>
                        <div class="dashboard_userMgnt_seachbar_role_filter_value flexc">
                            <input class="dashboard_userMgnt_seachbar_role_filter_input" type="radio" id="userMgnt_inpRole_all" value="all" name="userMgnt_inpRole_val" checked="checked" />
                            <p class="dashboard_userMgnt_seachbar_role_filter_input_text flexc">All</p>
                        </div>
                        <div class="dashboard_userMgnt_seachbar_role_filter_icon flexc"><i class="fal fa-angle-down"></i></div>
                    </div>
                    <ul class="dashboard_userMgnt_seachbar_role_filter_list">
                        <li><label class="dashboard_userMgnt_seachbar_role_filter_option" for="userMgnt_inpRole_all">All</label></li>

                        <li><label class="dashboard_userMgnt_seachbar_role_filter_option" for="userMgnt_inpRole_admin">Admin</label></li>
                        <li><label class="dashboard_userMgnt_seachbar_role_filter_option" for="userMgnt_inpRole_contributor">Contributor</label></li>
                        <li><label class="dashboard_userMgnt_seachbar_role_filter_option" for="userMgnt_inpRole_newbie">Newbie</label></li>
                    </ul>
                </div>
            </div>

            <div class="dashboard_userMgnt_seachbar_status_filter_wrap">
                <div class="seachbar_status_filter_wrap_title">Status</div>
                <div class="dashboard_userMgnt_seachbar_status_filter">
                    <div class="dashboard_userMgnt_seachbar_status_filter_current flexc" tabindex="2">
                        <div class="dashboard_userMgnt_seachbar_status_filter_value flexc">
                            <input class="dashboard_userMgnt_seachbar_status_filter_input" type="radio" id="userMgnt_inpStatus_active" value="active" name="userMgnt_inpStatus_val" checked="checked" />
                            <p class="dashboard_userMgnt_seachbar_status_filter_input_text flexc">Active</p>
                        </div>
                        <div class="dashboard_userMgnt_seachbar_status_filter_value flexc">
                            <input class="dashboard_userMgnt_seachbar_status_filter_input" type="radio" id="userMgnt_inpStatus_disable" value="disable" name="userMgnt_inpStatus_val" checked="checked" />
                            <p class="dashboard_userMgnt_seachbar_status_filter_input_text flexc">Disable</p>
                        </div>
                        <div class="dashboard_userMgnt_seachbar_status_filter_value flexc">
                            <input class="dashboard_userMgnt_seachbar_status_filter_input" type="radio" id="userMgnt_inpStatus_all" value="all" name="userMgnt_inpStatus_val" checked="checked" />
                            <p class="dashboard_userMgnt_seachbar_status_filter_input_text flexc">All</p>
                        </div>
                        <div class="dashboard_userMgnt_seachbar_status_filter_icon flexc"><i class="fal fa-angle-down"></i></div>
                    </div>
                    <ul class="dashboard_userMgnt_seachbar_status_filter_list">
                        <li><label class="dashboard_userMgnt_seachbar_status_filter_option" for="userMgnt_inpStatus_all">All</label></li>

                        <li><label class="dashboard_userMgnt_seachbar_status_filter_option" for="userMgnt_inpStatus_active">Active</label></li>
                        <li><label class="dashboard_userMgnt_seachbar_status_filter_option" for="userMgnt_inpStatus_disable">Disable</label></li>
                    </ul>
                </div>
            </div>


            <div class="dashboard_userMgnt_seachbar_btn flexc">search</div>

            <!-- <div style="width:50%"></div> -->

            <div class="dashboard_userMgnt_pagination_con flexc">
                <div class="dashboard_userMgnt_pagination userMgnt_pagination_rnd"><i class="fal fa-angle-left"></i></div>
                <div class="dashboard_userMgnt_pagination userMgnt_pagination_active">1</div>
                <div class="dashboard_userMgnt_pagination">2</div>
                <div class="dashboard_userMgnt_pagination">3</div>
                ....
                <div class="dashboard_userMgnt_pagination">10</div>
                <div class="dashboard_userMgnt_pagination userMgnt_pagination_rnd"><i class="fal fa-angle-right"></i></div>
            </div>
        </div>


        <div class="dashboard_userMgnt_tableToolBar_con">
            <div class="dashboard_userMgnt_tableToolBar_wrap flexc">

                <div class="dashboard_userMgnt_seachbar_roleEdit_filter_con">
                    <div class="dashboard_userMgnt_seachbar_roleEdit_filter_title">Edit users</div>

                    <div class="dashboard_userMgnt_seachbar_roleEdit_filter">
                        <div class="dashboard_userMgnt_seachbar_roleEdit_filter_current flexc" tabindex="1">
                            <div class="dashboard_userMgnt_seachbar_roleEdit_filter_value flexc">
                                <input class="dashboard_userMgnt_seachbar_roleEdit_filter_input" type="radio" id="userMgnt_inpRoleEdit_admin" value="admin" name="userMgnt_inpRoleEdit_val" checked="checked" />
                                <p class="dashboard_userMgnt_seachbar_roleEdit_filter_input_text flexc">Admin</p>
                            </div>
                            <div class="dashboard_userMgnt_seachbar_roleEdit_filter_value flexc">
                                <input class="dashboard_userMgnt_seachbar_roleEdit_filter_input" type="radio" id="userMgnt_inpRoleEdit_contributor" value="contributor" name="userMgnt_inpRoleEdit_val" checked="checked" />
                                <p class="dashboard_userMgnt_seachbar_roleEdit_filter_input_text flexc">Contributor</p>
                            </div>
                            <div class="dashboard_userMgnt_seachbar_roleEdit_filter_value flexc">
                                <input class="dashboard_userMgnt_seachbar_roleEdit_filter_input" type="radio" id="userMgnt_inpRoleEdit_newbie" value="newbie" name="userMgnt_inpRoleEdit_val" checked="checked" />
                                <p class="dashboard_userMgnt_seachbar_roleEdit_filter_input_text flexc">Newbie</p>
                            </div>
                            <div class="dashboard_userMgnt_seachbar_roleEdit_filter_value flexc">
                                <input class="dashboard_userMgnt_seachbar_roleEdit_filter_input" type="radio" id="userMgnt_inpRoleEdit_changeRole" value="" name="userMgnt_inpRoleEdit_val" checked="checked" />
                                <p class="dashboard_userMgnt_seachbar_roleEdit_filter_input_text flexc">Change role</p>
                            </div>
                            <div class="dashboard_userMgnt_seachbar_roleEdit_filter_icon flexc"><i class="fal fa-angle-down"></i></div>
                        </div>
                        <ul class="dashboard_userMgnt_seachbar_roleEdit_filter_list">
                            <li><label class="dashboard_userMgnt_seachbar_roleEdit_filter_option" for="userMgnt_inpRoleEdit_changeRole">Change role</label></li>

                            <li><label class="dashboard_userMgnt_seachbar_roleEdit_filter_option" for="userMgnt_inpRoleEdit_admin">Admin</label></li>
                            <li><label class="dashboard_userMgnt_seachbar_roleEdit_filter_option" for="userMgnt_inpRoleEdit_contributor">Contributor</label></li>
                            <li><label class="dashboard_userMgnt_seachbar_roleEdit_filter_option" for="userMgnt_inpRoleEdit_newbie">Newbie</label></li>
                        </ul>
                    </div>
                </div>

                <div class="dashboard_userMgnt_tableToolBar_disableBtn flexc">Disable All</div>
            </div>
        </div>




        <div class="dashboard_userMgnt_userTable">
            <div class="userTable_head">
                <div class="userTable_row">

                    <div class="userTable_cell">
                        <div class="checkbox_con selectAll_article_check flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel article_selectAll_inp" type="checkbox" name="article_selectAll" value="select_all_blog">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>

                    <div class="userTable_cell userTable_cell_nameSort">Name</div>
                    <div class="userTable_cell userTable_cell_hide">Blogs</div>
                    <div class="userTable_cell userTable_cell_hide">Reports</div>
                    <div class="userTable_cell userTable_cell_hide">Last seen</div>
                    <div class="userTable_cell userTable_cell_hide">Status</div>
                    <div class="userTable_cell">Disable</div>
                    <div class="userTable_cell">View</div>
                    <div class="userTable_cell userTable_cell_hide">More</div>
                </div>
            </div>

            <div class="userTable_body">

                <div class="userTable_row">

                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>


                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/deb.jpg">
                            </div>
                            <div class="userTable_cell_userName">Debjeet Das<br><small class="user_role user_role_admin">Admin</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">58 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">2 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status">Active</div>
                    </div>

                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/rahul.jpg">
                            </div>
                            <div class="userTable_cell_userName">Rahul Mondol<br><small class="user_role user_role_contrib">Contributor</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">83 K</div>
                    <div class="userTable_cell userTable_cell_hide">5</div>
                    <div class="userTable_cell userTable_cell_hide">7 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status cell_status_disable">Disabled</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/rahul.jpg">
                            </div>
                            <div class="userTable_cell_userName">Rahul Mondol<br><small class="user_role user_role_contrib">Contributor</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">83 K</div>
                    <div class="userTable_cell userTable_cell_hide">5</div>
                    <div class="userTable_cell userTable_cell_hide">7 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>

                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status cell_status_disable">Disable</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/Sourav.jpg">
                            </div>
                            <div class="userTable_cell_userName">Sourav Haga<br><small class="user_role user_role_newbie" style="background:#621700c9; color:#ffffff">Haga</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">-500 K</div>
                    <div class="userTable_cell userTable_cell_hide">10000</div>
                    <div class="userTable_cell userTable_cell_hide">1000 BC</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status cell_status_disable">Disable</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <!-- <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div>
                <div class="userTable_row">
                    <div class="userTable_cell">
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="#34">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_user_con flexc">
                            <div class="cell_userImg_wrap">
                                <img class="cell_userImg" src="./assests/users_img/abhi.jpg">
                            </div>
                            <div class="userTable_cell_userName">Abhishek Pandey<br><small class="user_role user_role_newbie">Newbie</small></div>
                        </div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">43 K</div>
                    <div class="userTable_cell userTable_cell_hide">0</div>
                    <div class="userTable_cell userTable_cell_hide">1 days ago</div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_status userTable_cell_hide">Active</div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_disable flexc"><i class="fal fa-ban"></i></div>
                    </div>
                    <div class="userTable_cell">
                        <div class="userTable_cell_btn cell_btn_view flexc"><i class="fal fa-eye"></i></div>
                    </div>
                    <div class="userTable_cell userTable_cell_hide">
                        <div class="userTable_cell_btn cell_btn_more flexc"><i class="far fa-angle-down"></i></div>
                    </div>
                </div> -->


            </div>
        </div>


    </div>
</div>
