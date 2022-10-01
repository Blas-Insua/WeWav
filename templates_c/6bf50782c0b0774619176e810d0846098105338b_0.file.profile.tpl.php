<?php
/* Smarty version 4.2.1, created on 2022-10-01 11:22:02
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633806ba324768_00814916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bf50782c0b0774619176e810d0846098105338b' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\profile.tpl',
      1 => 1664616121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633806ba324768_00814916 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="userCard">
    <ul>
        <li><b>Name:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->name;?>
</li>            
        <li><b>AKA:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->AKA;?>
</li>    
        <li><b>Country:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->country_id;?>
</li>    
        <li><b>Genre:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->genre_id;?>
</li>   
        <li><b>Tracks uploaded:</b> <?php echo $_smarty_tpl->tpl_vars['account']->value->totalTracks;?>
</li>
    </ul>
    <img class="userLogo" src="../images/Logo.png">
</div><?php }
}
