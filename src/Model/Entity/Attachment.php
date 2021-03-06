<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attachment Entity.
 *
 * @property int $id
 * @property int $product_id
 * @property \App\Model\Entity\Product $product
 * @property string $at_name
 * @property string $at_description
 * @property int $at_sort
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Attachment extends Entity {

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
        '*' => true,
        'id' => false,
    ];
}
