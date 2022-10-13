<?php
/* Smarty version 4.2.1, created on 2022-10-13 07:46:36
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6347a63cbd5817_39122661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cab46eafe01e076f0d58e4ed6546346e0e0f42bf' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\accounts.tpl',
      1 => 1665639994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6347a63cbd5817_39122661 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
    <div class="userCard">
    <ul>
        <li><b>Name:</b> <a href="about/<?php echo $_smarty_tpl->tpl_vars['account']->value->name;?>
/"><?php echo $_smarty_tpl->tpl_vars['account']->value->name;?>
</a></li>            
        <li><b>AKA:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->AKA;?>
</li>    
        <li><b>Country:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->country;?>
</li>    
        <li><b>Genre:</b> <a href="genres/<?php echo $_smarty_tpl->tpl_vars['account']->value->genre;?>
/"><?php echo $_smarty_tpl->tpl_vars['account']->value->genre;?>
</a></li>   
    </ul>
    <div class="userLogo">
        <img src="<?php if ($_smarty_tpl->tpl_vars['account']->value->photo_dir == null) {?>./images/profile_photos/default.png<?php } else {
echo $_smarty_tpl->tpl_vars['account']->value->photo_dir;
}?>"></img>
    </div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
