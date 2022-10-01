<?php
/* Smarty version 4.2.1, created on 2022-10-01 17:47:40
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\accounts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6338611c8577b6_51168750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cab46eafe01e076f0d58e4ed6546346e0e0f42bf' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\accounts.tpl',
      1 => 1664639259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6338611c8577b6_51168750 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'account');
$_smarty_tpl->tpl_vars['account']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
$_smarty_tpl->tpl_vars['account']->do_else = false;
?>
    <div class="userCard">
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
    </ul>
    <img class="userLogo" src="../images/Logo.png">
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php }
}
