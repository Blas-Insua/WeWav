<?php
/* Smarty version 4.2.1, created on 2022-10-01 09:06:18
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\signupForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6337e6eab6aa95_73209335',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb6b04d7292ad5cce692059d0ea3c93eeac984b5' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\signupForm.tpl',
      1 => 1664607977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6337e6eab6aa95_73209335 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="signup-form" action="signupSubmit" method="post">
    <div class="signup-form">
        <fieldset class="user-data" >
            <legend>Account Data</legend>

                <label for="createUserName">User name:</label>
                    <input type="text" id="createUserName" name="name" required>
                        <br>
                <label for="createUserAKA">A.k.a:</label>
                    <input type="text" id="createUserAKA" name="AKA">
                        <br>
                <label for="createUserPass">Password:</label>
                    <input type="password" id="createUserPass" name="pass" required> 
                        <br>
            <label for="createUserPassConfirm">Confirm password:</label>
                    <input type="password" id="createUserPassConfirm" name="passConfirm" required> 
                        <br>
    
                <label for="createUserCountry">Country</label>      
                    <select id="createUserCountry" name="country">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['country']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value->country;?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
            
                <div class="areArtist">
                    <label>Are you an artist?</label>
                        <select id="createUserisArtist" name="artist">
                            <option value="0">No</option>
                            <option value="1">Yes</option>									
                        </select>
                </div>
                <div class="createacc-artist">
                    <label id="createUserArtistType">What do you do?</label>
                        <label for="Producer"><input type="checkbox" name="artistType" value="Producer" id="Producer">Producer</label>
                        <label for="Beatmaker"><input type="checkbox" name="artistType" value="Beatmaker" id="Beatmaker">Beatmaker</label>
                        <label for="Singer"><input type="checkbox" name="artistType" value="Singer" id="Singer">Singer</label>
                        <label for="Musician"><input type="checkbox" name="artistType" value="Musician" id="Musician">Musician</label>
                    <div class="createUserArtistGenre">
                        <label for="createUserArtistGenre">What genre do you do?:</label>
                            <select id="createUserArtistGenre" name="genre">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genres']->value, 'genre');
$_smarty_tpl->tpl_vars['genre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['genre']->value) {
$_smarty_tpl->tpl_vars['genre']->do_else = false;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['genre']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['genre']->value->genre;?>
</option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                    </div>
                </div>
    
                <label for="createUserProfilePhoto">Profile photo:</label>
                    <input type="file" id="createUserProfilePhoto" name="createUserProfilePhoto"> 
                        <br>
    
                <input type="reset">
        </fieldset>


    </div>

    <div class="userCard">
        <table>
            <tr>
                <th>User name:</th>
                <td class="userCard-UserName"></td>
            </tr>
            <tr>
                <th>A.k.a:</th>
                <td class="userCard-aka"></td>
            </tr>
            <tr>
                <th>Type:</th>
                <td class="userCard-artist-type"></td>
            </tr>
            <tr>
                <th>Genre:</th>
                <td class="userCard-artist-genre"></td>
            </tr>
            <tr>
                <th>Country:</th>
                <td class="userCard-artist-country"></td>
            </tr>
        </table>
        <img class="userLogo">
    </div>

    <div class="captcha">
        <p id="Captcha"></p>
        <input type="button" id="reCaptcha" name="button"> 
    </div>
    
    <div class="submitdiv">
        <input type="text" id="captchaUser" name="captchaUser" placeholder="Enter the captcha"> 
        <input type="submit" id="index-submit" name="submitbutton" value="Signup" class="yellowBox"> 
    </div>
</form><?php }
}
