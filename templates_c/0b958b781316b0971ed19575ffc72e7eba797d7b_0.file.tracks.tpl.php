<?php
/* Smarty version 4.2.1, created on 2022-10-01 11:58:12
  from 'D:\Programs\XAMPP\htdocs\WeWav\templates\tracks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63380f34a7bcf7_57731470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b958b781316b0971ed19575ffc72e7eba797d7b' => 
    array (
      0 => 'D:\\Programs\\XAMPP\\htdocs\\WeWav\\templates\\tracks.tpl',
      1 => 1664618239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63380f34a7bcf7_57731470 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="tracks">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tracks']->value, 'track');
$_smarty_tpl->tpl_vars['track']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['track']->value) {
$_smarty_tpl->tpl_vars['track']->do_else = false;
?>
        <div class="file">
            <p><?php echo $_smarty_tpl->tpl_vars['track']->value->userName;?>
</p>
            <p><?php echo $_smarty_tpl->tpl_vars['track']->value->name;?>
</p>
            <img src="../images/file.png">
            <div>
                <p><?php echo $_smarty_tpl->tpl_vars['track']->value->genre;?>
</p>
                <p><?php echo $_smarty_tpl->tpl_vars['track']->value->date;?>
</p>
            </div>
            <audio controls src="" alt="" type="audio/wav"></audio>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}
