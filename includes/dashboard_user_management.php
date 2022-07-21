<script src="./js/dashboard_user_management.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<div class="dashboard_userMgnt_con">
    <div class="dashboard_userMgnt_wrap">
        <div class="dashboard_userMgnt_title">Users</div>



        <table class="dashboard_userMgnt_userTable">
            <thead>
                <tr>
                    <th>
                        <div class="checkbox_con selectAll_article_check flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel article_selectAll_inp" type="checkbox" name="article_selectAll" value="select_all_blog">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Blogs</th>
                    <th>Last seen</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Disable</th>
                    <th>More</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="checkbox_con flexc">
                            <label class="checkbox flexc">
                                <input class="overveiw_blog_article_sel" type="checkbox" name="article_select" value="blog_id#232">
                                <div class="checkmark flexc"><i class="far fa-check"></i></div>
                            </label>
                        </div>
                    </td>
                    <td class="">Debjeet Das</td>
                    <td>Admin</td>
                    <td>24</td>
                    <td>2 days ago</td>
                    <td>Active</td>
                    <td><i class="fal fa-eye"></i></td>
                    <td><i class="fal fa-ban"></i></td>
                    <td><i class="fal fa-ellipsis-v"></i></td>
                </tr>

            </tbody>
        </table>



    </div>
</div>
