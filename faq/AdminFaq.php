<?php

include_once(_PS_MODULE_DIR_.'faq/classes/FaqCore.php');

class AdminFaq extends AdminController
{
            public function __construct()
            {
                        // recupere les information url
                        $serv = $_SERVER['REQUEST_URI'];
                        $r = explode('&', $serv);

                        // update
                        if (!empty($_POST["updatereponce"]))
                        {

                                    $reponce = $_POST["updatereponce"];;
                                    $question= $_POST["updatequestion"];
                                    $id= $_POST["id"];

                                    $get_id_faq = $_POST["submitAddfaq"];;

                                    var_dump($_POST);
                                    $ttt = new FAQCore;
                                    $ttt->up($id,$reponce,$question);
                        }
                        /*add*/
                        elseif (!empty($_POST["addreponce"]))
                        {
                                    $reponce = $_POST["addreponce"];;
                                    $question= $_POST["addquestion"];
                                    $id= $_POST["id"];
                                    $add = new FaqCore;
                                    $add->add($reponce,$question);
                        }


                        $this->bootstrap = true;
                        $this->table = 'faq';
                        /*$this->className = 'Faq';*/
                        $this->lang = false;
                        $this->addRowAction('edit');
                        /*            $this->addRowAction('add');*/
                        $this->context = Context::getContext();

                        $profiles = Profile::getProfiles($this->context->language->id);
                        if (!$profiles)
                        {
                                    $this->errors[] = Tools::displayError('No profile.');
                        }

                        $this->fields_list = array(
                                    'id_faq' => array('title' => $this->l('ID'), 'align' => 'center', 'class' => 'fixed-width-xs'),
                                    'question' => array('title' => $this->l('question')),
                                    'reponce' => array('title' => $this->l('reponse')),
                        );

                        parent::__construct();
            }

            public function initPageHeaderToolbar()
            {
                        parent::initPageHeaderToolbar();

                        if (empty($this->display)) {

                                    $this->page_header_toolbar_btn['new_faq'] = array(
                                                'href' => self::$currentIndex.'&addfaq&token='.$this->token,
                                                'desc' => $this->l('Add new faq', null, null, false),
                                                'icon' => 'process-icon-new'
                                    );
                        }
// apele du formulaire
                        if ($this->display == 'edit')
                        {
                                    $obj = $this->loadObject(true);
                                    $this->renderForme('update','update','text');
                        }
                        if ($this->display == 'add')
                        {
                                    $this->renderForme('add','add','hidden');
                        }
            }

            public function renderForme($name = 'submit',$target = null,$type)
            {
                        /** @var Employee $obj */
                        if (!($obj = $this->loadObject(true))) {
                                    return;
                        }

                        $serv = $_SERVER['REQUEST_URI'];
                        $r = explode('&', $serv);
                        $val = explode('=',$r[1]);
                        // recupere id get
                        $get_id_faq = Tools::getValue("id_faq");

                        $this->fields_form = array(
                                    'legend' => array(
                                                'title' => $this->l('faq'),
                                                'icon' => 'icon-user'
                                    ),
                                    'input' => array(
                                                array(
                                                            'type' => 'text',
                                                            'class' => 'fixed-width-xl',
                                                            'label' => $this->l('Question'),
                                                            'name' => $target."reponce",
                                                            'required' => true,
                                                ),
                                                array(
                                                            'type' => 'text',
                                                            'class' => 'fixed-width-xl',
                                                            'label' => $this->l('Reponce'),
                                                            'name' => $target.'question',
                                                            'required' => true
                                                ),
                                                array(
                                                            'type' =>$type,// selon si add ou edit est utilise
                                                            'class' => 'fixed-width-xl',
                                                            'label' => $this->l('ID'),
                                                            'name' => 'id',
                                                            'required' => true
                                                ),
                                    ),
                        );

                        $this->fields_form['submit'] = array(
                                    'title' => $this->l($name),
                        );

                        $this->fields_value['updatereponce'] = $this->get_value($get_id_faq,'reponce');
                        $this->fields_value['updatequestion'] = $this->get_value($get_id_faq,'question');
                        if (!empty($val[1]))
                        {
                                    // ajoute input id seulement pour l'update
                                    $this->fields_value['id'] = $val[1];
                        }

                        if (empty($obj->id)) {
                                    $this->fields_value['id_lang'] = $this->context->language->id;
                        }


            }

            function get_value($id = null ,$champ)
            {
                        if ($id == null)
                        {
                                    return false;
                        }
                        global $smarty;
                        $result =Db::getInstance()->ExecuteS("select * from "._DB_PREFIX_."faq WHERE id_faq = ".$id);
                        return $result[0][$champ];
            }


}

?>



<!--if ($this->display == 'edit')
{
$obj = $this->loadObject(true);
if (Validate::isLoadedObject($obj)) {

/** @var Employee $obj */
array_pop($this->toolbar_title);
$this->page_header_toolbar_title = implode(' '.Configuration::get('PS_NAVIGATION_PIPE').' ',
$this->toolbar_title);
$this->renderForm();
}

}-->
