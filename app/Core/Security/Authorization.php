<?php

/*
 * This file is part of Jitamin.
 *
 * Copyright (C) 2016 Jitamin Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jitamin\Core\Security;

/**
 * Authorization Handler.
 */
class Authorization
{
    /**
     * Access Map.
     *
     * @var AccessMap
     */
    private $accessMap;

    /**
     * Constructor.
     *
     * @param AccessMap $accessMap
     */
    public function __construct(AccessMap $accessMap)
    {
        $this->accessMap = $accessMap;
    }

    /**
     * Check if the given role is allowed to access to the specified resource.
     *
     * @param string $controller
     * @param string $method
     * @param string $role
     *
     * @return bool
     */
    public function isAllowed($controller, $method, $role)
    {
        $roles = $this->accessMap->getRoles($controller, $method);

        return in_array($role, $roles);
    }
}
