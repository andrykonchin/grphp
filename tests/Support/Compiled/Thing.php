<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grphp/test/Things.proto

namespace Grphp\Test;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>grphp.test.Thing</code>
 */
class Thing extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>uint64 id = 1;</code>
     */
    private $id = 0;
    /**
     * <code>string name = 2;</code>
     */
    private $name = '';

    public function __construct() {
        \GPBMetadata\Grphp\Test\Things::initOnce();
        parent::__construct();
    }

    /**
     * <code>uint64 id = 1;</code>
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * <code>uint64 id = 1;</code>
     */
    public function setId($var)
    {
        GPBUtil::checkUint64($var);
        $this->id = $var;
    }

    /**
     * <code>string name = 2;</code>
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * <code>string name = 2;</code>
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;
    }

}

