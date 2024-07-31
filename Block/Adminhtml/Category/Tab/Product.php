<?php 
/**
 * Mavenbird Technologies Private Limited
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://mavenbird.com/Mavenbird-Module-License.txt
 *
 * =================================================================
 *
 * @category   Mavenbird
 * @package    Mavenbird_AdminCategoryProductThumbnail
 * @author     Mavenbird Team
 * @copyright  Copyright (c) 2018-2024 Mavenbird Technologies Private Limited ( http://mavenbird.com )
 * @license    http://mavenbird.com/Mavenbird-Module-License.txt
 */ 
declare(strict_types=1);

namespace Mavenbird\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab;

use Magento\Framework\Data\Collection;
use Mavenbird\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab\Product\Grid\Renderer\Image;

class Product extends \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
{
    /**
     * Set collection object adding product thumbnail
     *
     * @param  Collection $collection
     * @return void
     */
    public function setCollection($collection)
    {
        $collection->addAttributeToSelect('thumbnail');
        $this->_collection = $collection;
    }

    /**
     * Add column image with a custom renderer and after column entity_id
     *
     * @return Product
     */
    protected function _prepareColumns(): Product
    {
        parent::_prepareColumns();
        $this->addColumnAfter(
            'image',
            [
                'header' => __('Thumbnail'),
                'index' => 'image',
                'renderer' => Image::class,
                'filter' => false,
                'sortable' => false,
                'column_css_class' => 'data-grid-thumbnail-cell'
            ],
            'entity_id'
        );
        $this->sortColumnsByOrder();

        return $this;
    }
}
