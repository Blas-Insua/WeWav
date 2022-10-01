<?php
/* Smarty version 4.2.1, created on 2022-10-01 11:58:32
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63380f48c2f626_39530700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cab46eafe01e076f0d58e4ed6546346e0e0f42bf' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\accounts.tpl',
      1 => 1664618311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63380f48c2f626_39530700 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
    <div class="userCard">
        <ul>
            <li><b>Name:</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</li>            
            <li><b>AKA:</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->AKA;?>
</li>    
            <li><b>Country:</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->country_id;?>
</li>    
            <li><b>Genre:</b> <?php echo $_smarty_tpl->tpl_vars['user']->value->genre_id;?>
</li>   
            <li><b>Tracks uploaded:</b> <?php echo $_smarty_tpl->tpl_vars['totalTracks']->value;?>
</li>
        </ul>
        <img class="userLogo" src="../images/Logo.png">
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
