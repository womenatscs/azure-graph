<?php

namespace Azure\Api;

use \Azure\Interfaces\EntityInterface;

class Groups extends AbstractApi implements EntityInterface
{

    /**
     * Fetch all Groups
     *
     * @return stdClass         Standard response object from $this->_respond()
     *
     * @todo Implement pagination...
     */
    public function all()
    {
        return $this->get('groups', ['$top' => 500]);   // Max $top is 999
    }

    /**
     * Fetch the Group identified by $groupId
     *
     * @param  string $groupId   Azure objectId of the Group to fetch
     *
     * @return stdClass         Standard response object from $this->_respond()
     */
    public function one($groupId)
    {
        return $this->get("groups/{$groupId}");
    }

    /**
     * [find description]
     *
     * @param  [type] $filters [description]
     *
     * @return stdClass         Standard response object from $this->_respond()
     */
    public function find($filters)
    {
    }

    /**
     * Create a new Group
     *
     * @param  array $group Array of properties that describe the new Group
     *
     * @return stdClass         Standard response object from $this->_respond()
     */
    public function create($group)
    {
        return $this->post("groups", $group);
    }

    /**
     * Update an existing Group identified by $groupId. Properties in $group
     * overwrite the current properties of the Group, if defined.
     *
     * @param  string $groupId  Azure objectId of the Group to update
     * @param  array  $group    Array of properties describing the Group
     *
     * @return stdClass         Standard response object from $this->_respond()
     */
    public function edit($groupId, $group)
    {
        return $this->patch("groups/{$groupId}", $group);
    }

    /**
     * Actions have side effects in the directory. That is, when you call an action,
     * it may alter data in the directory.
     *
     * @param  string $groupId      Azure objectId of the Group
     * @param  array  $actionName   Which action to execute
     * @param  array  $actionParam  Parameter to pass along in the call
     *
     * @return stdClass         Standard response object from $this->_respond()
     */
    public function action($groupId, $actionName, $actionParam)
    {
        return $this->post("groups/{$groupId}/{$actionName}", $actionParam);
    }

    /**
     * Delete the group represented by $groupId
     *
     * @param  string $groupId  The Azure objectId of the Group to delete
     *
     * @return stdClass         Standard response object from $this->_respond()
     */
    public function remove($groupId)
    {
        return $this->delete("groups/{$groupId}");
    }
}
