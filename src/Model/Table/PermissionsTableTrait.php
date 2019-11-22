<?php
/**
 * CakePHP permission handling library
 * @author Tao <taosikai@yeah.net>
 */
namespace App\Model\Table;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\ORM\Table;

trait PermissionsTableTrait
{
    public function buildPermissionRelationship()
    {
        $this->belongsToMany('Roles', [
            'className' => 'Roles',
            'foreignKey' => 'permission_id',
            'targetForeignKey' => 'role_id',
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
        Cache::delete(sprintf(Constants::CACHE_PERMISSIONS, $userId));
    }
}
