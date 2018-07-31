<?php

class JMSSerializerAdapter_a5dd94b extends \FOS\RestBundle\Serializer\JMSSerializerAdapter implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolder3bae5 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer769a6 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesef40b = [
        
    ];

    public function serialize($data, $format, \FOS\RestBundle\Context\Context $context)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'serialize', array('data' => $data, 'format' => $format, 'context' => $context), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->serialize($data, $format, $context);
    }

    public function deserialize($data, $type, $format, \FOS\RestBundle\Context\Context $context)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'deserialize', array('data' => $data, 'type' => $type, 'format' => $format, 'context' => $context), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->deserialize($data, $type, $format, $context);
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?: $reflection = new \ReflectionClass(__CLASS__);
        $instance = (new \ReflectionClass(get_class()))->newInstanceWithoutConstructor();

        \Closure::bind(function (\FOS\RestBundle\Serializer\JMSSerializerAdapter $instance) {
            unset($instance->serializer, $instance->serializationContextFactory, $instance->deserializationContextFactory);
        }, $instance, 'FOS\\RestBundle\\Serializer\\JMSSerializerAdapter')->__invoke($instance);

        $instance->initializer769a6 = $initializer;

        return $instance;
    }

    public function __construct(\JMS\Serializer\SerializerInterface $serializer, ?\JMS\Serializer\ContextFactory\SerializationContextFactoryInterface $serializationContextFactory = null, ?\JMS\Serializer\ContextFactory\DeserializationContextFactoryInterface $deserializationContextFactory = null)
    {
        static $reflection;

        if (! $this->valueHolder3bae5) {
            $reflection = $reflection ?: new \ReflectionClass('FOS\\RestBundle\\Serializer\\JMSSerializerAdapter');
            $this->valueHolder3bae5 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\FOS\RestBundle\Serializer\JMSSerializerAdapter $instance) {
            unset($instance->serializer, $instance->serializationContextFactory, $instance->deserializationContextFactory);
        }, $this, 'FOS\\RestBundle\\Serializer\\JMSSerializerAdapter')->__invoke($this);

        }

        $this->valueHolder3bae5->__construct($serializer, $serializationContextFactory, $deserializationContextFactory);
    }

    public function & __get($name)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, '__get', ['name' => $name], $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        if (isset(self::$publicPropertiesef40b[$name])) {
            return $this->valueHolder3bae5->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3bae5;

            $backtrace = debug_backtrace(false);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    get_parent_class($this),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
            return;
        }

        $targetObject = $this->valueHolder3bae5;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3bae5;

            return $targetObject->$name = $value;
            return;
        }

        $targetObject = $this->valueHolder3bae5;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, '__isset', array('name' => $name), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3bae5;

            return isset($targetObject->$name);
            return;
        }

        $targetObject = $this->valueHolder3bae5;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, '__unset', array('name' => $name), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3bae5;

            unset($targetObject->$name);
            return;
        }

        $targetObject = $this->valueHolder3bae5;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __clone()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, '__clone', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        $this->valueHolder3bae5 = clone $this->valueHolder3bae5;
    }

    public function __sleep()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, '__sleep', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return array('valueHolder3bae5');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\FOS\RestBundle\Serializer\JMSSerializerAdapter $instance) {
            unset($instance->serializer, $instance->serializationContextFactory, $instance->deserializationContextFactory);
        }, $this, 'FOS\\RestBundle\\Serializer\\JMSSerializerAdapter')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer769a6 = $initializer;
    }

    public function getProxyInitializer()
    {
        return $this->initializer769a6;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'initializeProxy', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder3bae5;
    }

    public function getWrappedValueHolderValue() : ?object
    {
        return $this->valueHolder3bae5;
    }


}
