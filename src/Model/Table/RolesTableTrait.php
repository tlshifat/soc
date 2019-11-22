<?php
/**
 * CakePHP permission handling library
 * @author Tao <taosikai@yeah.net>
 */
namespace App\Model\Table;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\ORM\Table;

trait RolesTableTrait
{
    public function buildPermissionRelationship()
    {
        $this->belongsToMany('Users', [
            'className' => 'Users',
            'foreignKey' => 'role_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'user_roles'
        ]);

        $this->belongsToMany('Permissions', [
            'className' => 'Permissions',
            'foreignKey' => 'role_id',
            'targetForeignKey' => 'permission_id',
            'joinTable' => 'roles_permissions'
        ]);
        $this->addBehavior('Timestamp');
    }

    /**
     * Refreshes the cache
     * @param int $userId
     */
    public static function refreshCache($userId)
    {
        Cache::delete(sprintf(Constants::CACHE_ROLES, $userId));
    }
}
