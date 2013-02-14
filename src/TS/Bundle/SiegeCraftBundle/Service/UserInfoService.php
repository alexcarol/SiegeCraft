<?php

namespace TS\Bundle\SiegeCraftBundle\Service;


class UserInfoService {
    /**
     * @param $userId
     * @return array
     */
    public function getUserTabs($userId)
    {
        return array('Tab A', 'Tab B');
    }
}