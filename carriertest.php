<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class CarrierTest extends Module
{

    public function __construct()
    {
        $this->name = 'carriertest';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Apernet S.A';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_,
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Prueba de creación de transportistas');
        $this->description = $this->l(
            'Módulo creado unicamente con el objecto de realizar una prueba de concepto para ver como se comporta la creación de un transportista propio de presta.'
        );

        $this->confirmUninstall = $this->l('¿Estas seguro de que quieres desinstalar este módulo?');

        include_once dirname(__FILE__) . '/controllers/admin/AdminCarrierTestController.php';
    }

    public function install()
    {
        if (!$this->installTab()) {
            return false;
        }

        return (
        parent::install()
        );
    }

    public function uninstall()
    {
        $tab = new Tab((int)TabCore::getIdFromClassName('AdminCarrierTest'));
        if ($tab) {
            $tab->delete();
        }

        return (
        parent::uninstall()
        );
    }

    public function installTab()
    {
        $version = explode('.', _PS_VERSION_)[1];

        $tab = new Tab();
        $tab->active = 1;
        $tab->name = array();
        $tab->class_name = 'AdminCarrierTest';

        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'CarrierTest';
        }

        if ((int)$version == 6) {
            $tab->id_parent = 13;
        } else {
            $tab->id_parent = 3;
        }
        $tab->module = $this->name;

        return $tab->add();
    }

    public function getContent()
    {
        $controller = new AdminCarrierTestController();
        return $controller->renderList();
    }
}
