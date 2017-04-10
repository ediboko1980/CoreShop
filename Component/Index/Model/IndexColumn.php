<?php

namespace CoreShop\Component\Index\Model;

use CoreShop\Component\Resource\Model\AbstractResource;

class IndexColumn extends AbstractResource implements IndexColumnInterface
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $objectKey;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $objectType;

    /**
     * @var string
     */
    public $getter;

    /**
     * @var array
     */
    public $getterConfig;

    /**
     * @var string
     */
    public $dataType;

    /**
     * @var string
     */
    public $interpreter;

    /**
     * @var array
     */
    public $interpreterConfig;

    /**
     * @var string
     */
    public $columnType;

    /**
     * @var string
     */
    public $configuration;

    /**
     * @var IndexInterface
     */
    public $index;

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getObjectKey()
    {
        return $this->objectKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setObjectKey($objectKey)
    {
        $this->objectKey = $objectKey;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * {@inheritdoc}
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetter()
    {
        return $this->getter;
    }

    /**
     * {@inheritdoc}
     */
    public function setGetter($getter)
    {
        $this->getter = $getter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getGetterConfig()
    {
        return $this->getterConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function setGetterConfig($getterConfig)
    {
        $this->getterConfig = $getterConfig;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * {@inheritdoc}
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInterpreter()
    {
        return $this->interpreter;
    }

    /**
     * {@inheritdoc}
     */
    public function setInterpreter($interpreter)
    {
        $this->interpreter = $interpreter;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getInterpreterConfig()
    {
        return $this->interpreterConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function setInterpreterConfig($interpreterConfig)
    {
        $this->interpreterConfig = $interpreterConfig;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumnType()
    {
        return $this->columnType;
    }

    /**
     * {@inheritdoc}
     */
    public function setColumnType($columnType)
    {
        $this->columnType = $columnType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * {@inheritdoc}
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * {@inheritdoc}
     */
    public function setIndex(IndexInterface $index)
    {
        $this->index = $index;
    }
}