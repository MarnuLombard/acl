<?php

namespace LaravelDoctrine\ACL\Mappings\Subscribers;

use Doctrine\ORM\Mapping\ClassMetadata;
use LaravelDoctrine\ACL\Contracts\Organisation;
use LaravelDoctrine\ACL\Mappings\Builders\ManyToManyBuilder;
use LaravelDoctrine\ACL\Mappings\HasManyUsers;

class HasManyUsersSubscriber extends MappedEventSubscriber
{
    /**
     * @param $metadata
     *
     * @return bool
     */
    protected function shouldBeMapped(ClassMetadata $metadata)
    {
        return !$this->getInstance($metadata) instanceof Organisation;
    }

    /**
     * @return string
     */
    public function getAnnotationClass()
    {
        return HasManyUsers::class;
    }

    /**
     * @return string
     */
    protected function getBuilder()
    {
        return ManyToManyBuilder::class;
    }
}
