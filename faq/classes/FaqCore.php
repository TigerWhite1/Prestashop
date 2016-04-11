<?php

class FAQCore extends ObjectModel
{
  public static $definition = array(
        'table' => 'faq',
        'primary' => 'id_faq',
        'fields' => array(
            'reponce' =>  array('type' => self::TYPE_STRING),
            'question' => array('type' => self::TYPE_STRING)
        ),
    );

    public function up($id,$rep,$ques)
    {
      global $smarty;
      Db::getInstance()->update('faq', array('reponce'=>$rep,'question'=>$ques),'id_faq = '.(int)$id);
    }

    public function add($rep,$quest)
    {
        // creation d'un champ dans le panal admin
        $db = Db::getInstance();
        Db::getInstance()->insert('faq', array(
          'reponce' => $rep,
          'question' => $quest,
        ));
    }
}
