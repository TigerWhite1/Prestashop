<?php

if (!defined('_PS_VERSION_'))
exit;


class Faq extends Module
{

  function __construct()
  {
    $this->name = 'faq';
    $this->tab = 'faq';// categorie du module
    $this->version = 0.1;
    $this->displayName = $this->l('faq');
    $this->description = $this->l('web@cademie!!!!');
    $this->confirmUninstall = $this->l('yesh ?');
    parent::__construct();
  }

  function install()
  {
    if (!parent::install())
    return false;
    if (!$this->registerHook('top'))
    return false;

    // creation d'un champ dans le panal admin
    $db = Db::getInstance();
    Db::getInstance()->insert('tab', array(
      'id_parent' => "0",
      'class_name' => "AdminFaq",
      'module' => "faq",
      'position' => "1",
      'active' => "1",
    ));

    // creation de la table dans la bdd
    $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'faq` (
    `id_faq` int(10) NOT NULL AUTO_INCREMENT,
    `question` text NOT NULL,
    `reponce` text NOT NULL,
    `desactive` int(1) NOT NULL DEFAULT \'0\',
    PRIMARY KEY (`id_faq`)
    ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;';
    $result &= Db::getInstance()->execute($sql);

    return true;
  }

  public function uninstall()
  {
    if (!parent::uninstall())
    return false;

Db::getInstance()->delete('ps_tab', 'class_name = "AdminFaq"');
/*DELETE FROM `prefix_target_table` WHERE myField < 15 LIMIT 3*/
  }



  function hookDisplayTop($params){
    global $smarty;

    $mymodule = new faq();
    $message = $mymodule->l('Welcome to my shop!');
    $smarty->assign('messageSmarty', 'CECI EST UNE VARIABLE' ); // creation of our variable
    $smarty->display(dirname(__FILE__).'/faq.tpl');

    include( '../../footer.php' );
  }

}




?>
