<?php
/* Smarty version 4.2.1, created on 2022-10-01 12:51:33
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\userCard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63381bb560be71_76572752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31d9527ed9827d7cb2d547a4a81eb06b18023f5e' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\userCard.tpl',
      1 => 1664621490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63381bb560be71_76572752 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="userCard">
        <ul>
            <li><b>Name:</b> <a href='about/<?php echo $_smarty_tpl->tpl_vars['account']->value->name;?>
'><?php echo $_smarty_tpl->tpl_vars['account']->value->name;?>
</a></li>            
            <li><b>AKA:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->AKA;?>
</li>    
            <li><b>Country:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->country;?>
</li>    
            <li><b>Genre:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->genre;?>
</li>   
            <li><b>Tracks uploaded:</b> <?php echo $_smarty_tpl->tpl_vars['totalTracks']->value;?>
</li>
        </ul>
        <img class="userLogo" src="../images/Logo.png">
    </div><?php }
}
