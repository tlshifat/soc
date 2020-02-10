<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankTransfer Entity
 *
 * @property int $id
 * @property int $bkash_deposit_id
 * @property int $bank_account_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BkashDeposit $bkash_deposit
 * @property \App\Model\Entity\BankAccount $bank_account
 * @property \App\Model\Entity\User $user
 */
class BankTransfer extends Entity
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
        'bkash_deposit_id' => true,
        'bank_account_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'bkash_deposit' => true,
        'bank_account' => true,
        'user' => true
    ];
}
