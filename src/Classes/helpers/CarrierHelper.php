<?php

namespace Aper\CarrierTest\Classes\helpers;

use Carrier;
use Context;
use Db;
use Delivery;
use Exception;
use Group;
use RangePrice;
use RangeWeight;
use Zone;


class CarrierHelper
{

    public static function addZones($carrier)
    {
        $zones = Zone::getZones();
        foreach ($zones as $zone) {
            try {
                if ($zone['id_zone'] == 6) {
                    $carrier->addZone($zone['id_zone']);
                }
            } catch (Exception $e) {
            }
        }
    }

    public static function addGroups($carrier)
    {
        try {
            $groups_ids = array();
            $groups = Group::getGroups(Context::getContext()->language->id);
            foreach ($groups as $group) {
                $groups_ids[] = $group['id_group'];
            }

            $carrier->setGroups($groups_ids);
        } catch (Exception $e) {
        }
    }

    public static function addRanges($carrier)
    {
        try {
            $range_price = new RangePrice();
            $range_price->id_carrier = $carrier->id;
            $range_price->delimiter1 = '0';
            $range_price->delimiter2 = '1000';
            $range_price->add();

            $range_weight = new RangeWeight();
            $range_weight->id_carrier = $carrier->id;
            $range_weight->delimiter1 = 0;
            $range_weight->delimiter2 = 1000;
            $range_weight->add();

            $delivery = new Delivery();
            $delivery->id_shop = 1;
            $delivery->id_shop_group = 1;
            $delivery->id_carrier = $carrier->id;
            $delivery->id_range_weight = (int)$range_weight->id;
            $delivery->id_range_price = (int)$range_price->id;
            $delivery->id_zone = 6;
            $delivery->price = 0.000000;
            $delivery->add();
        } catch (Exception $e) {
        }
    }


    public static function addTaxCarrierRulesGroupShop($carrier)
    {
        Db::getInstance()->insert('carrier_tax_rules_group_shop', array(
            'id_carrier' => (int)$carrier->id,
            'id_tax_rules_group' => 1,
            'id_shop' => 1,
        ));
    }

    public static function getCarrierByName($name)
    {
        $id_carrier = Db::getInstance()->getValue(
            'SELECT max(id_carrier) FROM `' . _DB_PREFIX_ . 'carrier` WHERE name = "' . $name . '" AND deleted = 0'
        );
        if (!$id_carrier) {
            return false;
        }
        return new Carrier($id_carrier);
    }
}
