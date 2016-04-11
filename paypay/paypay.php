<?php
if (!defined('_PS_VERSION_'))
  exit;

class Paypay extends PaymentModule
{
  public function __construct()
  {
    $this->name = 'paypay';
    $this->tab = 'paiement';
    $this->version = 1.0;
    $this->author = 'thomas';
    $this->need_instance = 0;
    $this->bootstrap = true;
    $this->currencies_mode = 'checkbox';
    parent::__construct();

    $this->displayName = $this->l('paypay');
    $this->description = $this->l('module de paiement via paypal');
  }

  // public function hookDisplayTop($params)
  // {
  //   global $smarty;
  //   return $this->display(__FILE__, 'paypay.tpl');
  // }

  public function hookPayment($params)
  {
    if (!$this->active)
      return;
    // if (!$this->checkCurrency($params['cart']))
    //   return;

    $this->smarty->assign(array(
      'this_path' => $this->_path,
      'this_path_bw' => $this->_path,
      'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->name.'/'
      ));
    return $this->display(__FILE__, 'paypay.tpl');
  }

  public function hookHeader()
  {
    // $this->paypay->addJS(($this->_path). 'paypay.js');
    $this->context->controller->addJs($this->_path . 'paypay.js');
    // $process = '<script type="text/javascript">'.$this->fetchTemplate('paypay.js').'</script>';
    // return $process;
  }
  public function displayForm()
  {

  }


  // public function hookDisplayPaymentEU($params)
  // {
  //   // if (!$this->active)
  //   //   return;

  //   // if (!$this->checkCurrency($params['cart']))
  //   //   return;
  //   $payment_options = array(
  //     'cta_text' => $this->l('Pay by Bank Wire'),
  //     // 'logo' => Media::getMediaPath(_PS_MODULE_DIR_'paypay/bankwire.jpg'),
  //     'action' => $this->context->link->getModuleLink('paypay', 'validation', array(), true)
  //     );

  //   return $payment_options;
  // }

  public function install()
  {
    if (parent::install() == false || !$this->registerHook('payment') || ! $this->registerHook('displayPaymentEU') || !$this->registerHook('paymentReturn') || !$this->registerHook('header'))
      return false;
    return true;
  }
  public function uninstall()
  {
    if (!parent::uninstall())
      Db::getInstance()->Execute('DELETE FROM `'._DB_PREFIX_.'paypay`');
    parent::uninstall();
  }
}
?>