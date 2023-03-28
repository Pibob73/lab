<?php
require_once 'User.php';
class UserService
{
    /**
     * @param User[] $list
     * @return User[]
     */
    public function sortByName(array $list, string $direct): array
    {
        /**
         * @param User $first 
         * @param User $second
         * @return boolean
         */
        usort($list, function ($first, $second) use ($direct) {
            $valueOnAlpha = strnatcasecmp($first->name, $second->name);
            return $direct === 'up' ? $valueOnAlpha : !$valueOnAlpha;
        });
        return $list;
    }
    /**
     * @param User[] $list
     * @return  User[]
     */
    public function sortByBirthday(array $list, string $direct): array
    {
        /**
         * @param User $first 
         * @param User $second
         * @return boolean
         */
        usort($list, function ($first, $second) use ($direct) {
            $compare = $first->birthday->getTimestamp() <=> $second->birthday->getTimestamp();
            return $direct === 'up' ? $compare : !$compare;
        });
        return $list;
    }
}
