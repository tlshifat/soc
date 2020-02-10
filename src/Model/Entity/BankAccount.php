<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankAccount Entity
 *
 * @property int $id
 * @property string $account_number
 * @property string $bank_name
 * @property string $branch_name
 * @property string $route
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BankTransfer[] $bank_transfers
 */
class BankAccount extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'account_number' => true,
        'bank_name' => true,
        'branch_name' => true,
        'route' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'bank_transfers' => true
    ];
}
