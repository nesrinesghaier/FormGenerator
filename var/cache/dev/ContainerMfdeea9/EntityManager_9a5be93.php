<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
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

    public function getConnection()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getConnection', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getMetadataFactory', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getExpressionBuilder', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'beginTransaction', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getCache', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getCache();
    }

    public function transactional($func)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'transactional', array('func' => $func), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->transactional($func);
    }

    public function commit()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'commit', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->commit();
    }

    public function rollback()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'rollback', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getClassMetadata', array('className' => $className), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'createQuery', array('dql' => $dql), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'createNamedQuery', array('name' => $name), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'createQueryBuilder', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'flush', array('entity' => $entity), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->flush($entity);
    }

    public function find($entityName, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'find', array('entityName' => $entityName, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->find($entityName, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'clear', array('entityName' => $entityName), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->clear($entityName);
    }

    public function close()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'close', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->close();
    }

    public function persist($entity)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'persist', array('entity' => $entity), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'remove', array('entity' => $entity), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'refresh', array('entity' => $entity), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'detach', array('entity' => $entity), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'merge', array('entity' => $entity), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getRepository', array('entityName' => $entityName), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'contains', array('entity' => $entity), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getEventManager', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getConfiguration', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'isOpen', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getUnitOfWork', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getProxyFactory', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'initializeObject', array('obj' => $obj), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'getFilters', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'isFiltersStateClean', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer769a6 && ($this->initializer769a6->__invoke($valueHolder3bae5, $this, 'hasFilters', array(), $this->initializer769a6) || 1) && $this->valueHolder3bae5 = $valueHolder3bae5;

        return $this->valueHolder3bae5->hasFilters();
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

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer769a6 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder3bae5) {
            $reflection = $reflection ?: new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder3bae5 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder3bae5->__construct($conn, $config, $eventManager);
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
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
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
