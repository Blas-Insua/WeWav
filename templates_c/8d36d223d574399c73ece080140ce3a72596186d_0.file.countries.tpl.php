<?php
/* Smarty version 4.2.1, created on 2022-10-01 07:02:08
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\countries.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6337c9d08b9038_60294546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d36d223d574399c73ece080140ce3a72596186d' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\countries.tpl',
      1 => 1664599866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6337c9d08b9038_60294546 (Smarty_Internal_Template $_smarty_tpl) {
?><select id="createUserCountry" name="country">
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

<?php }
}
