<?php
/**
 * CoreShop
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015 Dominik Pfaffenbauer (http://dominik.pfaffenbauer.at)
 * @license    http://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Model\Dao;

use Pimcore\Model\Object\AbstractObject;
use Pimcore\Model\Dao;

abstract class AbstractDao extends Dao\AbstractDao {

    protected $tableName = '';

    public function getTableName() {
        return $this->tableName;
    }

    public function getById($id = null) {

        if ($id != null)
            $this->model->setId($id);

        $data = $this->db->fetchRow('SELECT * FROM '.$this->getTableName().' WHERE id = ?', $this->model->getId());

        if(!$data["id"])
            throw new \Exception(get_class($this->model) . " with the ID " . $this->model->getId() . " doesn't exists");


        $this->assignVariablesToModel($data);
        $this->getData();
    }

    /**
     * Get the data-elements for the object from database for the given path
     *
     * @return void
     */
    public function getData()
    {
        if($this->model->getLocalizedFields()) {
            $this->model->getLocalizedFields()->load();
        }
    }

    public function save() {

        $vars = get_object_vars($this->model);

        $buffer = array();

        $validColumns = $this->getValidTableColumns($this->getTableName());

        if(count($vars))
            foreach ($vars as $k => $v) {

                if(!in_array($k, $validColumns))
                    continue;

                $getter = "get" . ucfirst($k);

                if(!is_callable(array($this->model, $getter)))
                    continue;

                $value = $this->model->$getter();

                if(is_bool($value))
                    $value = (int)$value;
                if(is_array($value))
                    $value = serialize($value);
                if($value instanceof AbstractObject)
                    $value = $value->getId();

                $buffer[$k] = $value;
            }

        if($this->model->getId() !== null) {
            $this->db->update($this->getTableName(), $buffer, $this->db->quoteInto("id = ?", $this->model->getId()));
            return;
        }

        $this->db->insert($this->getTableName(), $buffer);
        $this->model->setId($this->db->lastInsertId());

        if($this->model->getLocalizedFields())
            $this->model->getLocalizedFields()->save();
    }

    public function delete() {
        $this->db->delete($this->getTableName(), $this->db->quoteInto("id = ?", $this->model->getId()));
    }
}