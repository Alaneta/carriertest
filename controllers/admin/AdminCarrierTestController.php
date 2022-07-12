<?php

use Aper\CarrierTest\Classes\helpers\CarrierHelper;

class AdminCarrierTestController extends ModuleAdminController
{
    public $name = "AdminCarriertest";
    public $local_path;
    public $url;
    public $controllerUrl;
    public $response;
    public $message;

    public function __construct()
    {
        $this->bootstrap = true;
        $this->response = new stdClass();
        $this->response->status = false;

        $this->lang = (!isset($this->context->cookie) || !is_object($this->context->cookie)) ? intval(
            Configuration::get('PS_LANG_DEFAULT')
        ) : intval($this->context->cookie->id_lang);
        $this->local_path = _PS_MODULE_DIR_ . 'carriertest' . '/';
        $this->controllerUrl = '/backoffice/index.php?controller=AdminCarrierTest' . '&token=' . Tools::getValue(
                'token'
            );
        $this->url = '/backoffice/index.php?controller=AdminModules&token=' . Tools::getAdminTokenLite(
                'AdminModules'
            ) . '&configure=carriertest&tab_module=emailing&module_name=carriertest';

//        include_once __DIR__ . '/../../classes/helpers/CarrierHelper.php';

        parent::__construct();
    }

    public function renderList()
    {
        $this->context->controller->addJS($this->local_path . 'views/js/config.js');
        return $this->processPosts();
    }


    public function processPosts()
    {
        if (Tools::isSubmit('carrierName') && Tools::isSubmit('logisticHubCarrierId')) {
            $carrierName = (string)Tools::getValue('carrierName');
            $logisticHubCarrierId = (string)Tools::getValue('logisticHubCarrierId');

            if (!$carrierName || !$logisticHubCarrierId) {
                $errorMsg = 'Campos obligatorios';
            } else {
                $carrier = new Carrier();
                $carrier->name = $carrierName;
                $carrier->is_module = 1;
                $carrier->id_tax_rules_group = 0;
                $carrier->active = 1;
                $carrier->shipping_handling = 0;
                $carrier->range_behavior = 0;
                $carrier->is_free = 0;
                $carrier->shipping_external = 1;
                $carrier->need_range = 1;
                $carrier->shipping_method = 1;
                $carrier->external_module_name = 'logistichub';
                $carrier->id_carrier_external = (int)$logisticHubCarrierId;

                foreach (Language::getLanguages() as $lang) {
                    $carrier->delay[$lang['id_lang']] = 'Condiciones ' . $carrierName;
                }

                $carrier->save();

                $carrierHelper = new CarrierHelper();
                $carrierHelper->addRanges($carrier);
                $carrierHelper->addGroups($carrier);
                $carrierHelper->addZones($carrier);
                $carrierHelper->addTaxCarrierRulesGroupShop($carrier);

                $successMsg = 'Datos guardados';
            }
        }

        $this->context->smarty->assign(array(
            'url' => $this->controllerUrl,
            'errorMsg' => isset($errorMsg) ? $errorMsg : '',
            'successMsg' => isset($successMsg) ? $successMsg : '',
        ));

        $this->context->smarty->assign('url', $this->controllerUrl);

        return $this->context->smarty->fetch($this->local_path . 'views/templates/admin/backoffice.tpl');
    }

}
