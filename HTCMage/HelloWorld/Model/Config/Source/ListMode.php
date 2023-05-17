<?php
namespace HTCMage\HelloWorld\Model\Config\Source;

class ListMode implements \Magento\Framework\Data\OptionSourceInterface
{
 public function toOptionArray()
 {
  return [
    ['value' => 1, 'label' => __('One Result')],
    ['value' => 2, 'label' => __('Two Results')],
    ['value' => 3, 'label' => __('Three Results')],
    ['value' => 4, 'label' => __('Four Results')],
    ['value' => 5, 'label' => __('Five Results')]
  ];
 }
}