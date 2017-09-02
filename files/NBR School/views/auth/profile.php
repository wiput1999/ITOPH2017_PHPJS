<div class="layout" style="padding: 0 30% 0 30% ;">
    <div class="layout-box">
        <div class="layout-highlight">
            Profile
        </div>

    </div>
    <div class="layput-box">
        <div class="layout-header">
            Profile
        </div>
        <div class="layout-content">
            <div class="profile">
                <table>
                    <tr>
                        <td>avatar</td>
                    <td class="profile-avatar">
                        <a href="?page=editavatar">
                            <img src="<?php echo $_SESSION['avatar']?>"/>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>email:</td>
                    <td><?php echo $_SESSION['email'] ?></td>
                </tr>
                <tr>
                    <td>name:</td>
                    <td><?php  echo $_SESSION['name']; ?></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><a href="?page=changepassword" style="color:red;">Change password</td>
                </tr>
                </table>
                <div class="layout-footer">
                    <a href=" ?page-editprofile" style="text -decoration:none;">
                        <div class="submit">Edit Profile</div></a>
                        </div>
                </div>
            </div>
            
