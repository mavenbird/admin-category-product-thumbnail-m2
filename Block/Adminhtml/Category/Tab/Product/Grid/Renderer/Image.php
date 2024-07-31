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

namespace Mavenbird\AdminCategoryProductThumbnail\Block\Adminhtml\Category\Tab\Product\Grid\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Framework\DataObject;

class Image extends AbstractRenderer
{
    /**
     *
     * @var ImageHelper
     */
    protected ImageHelper $imageHelper;

    /**
     * @param Context     $context
     * @param ImageHelper $imageHelper
     * @param array       $data
     */
    public function __construct(
        Context $context,
        ImageHelper $imageHelper,
        array $data = []
    ) {
        $this->imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }

    /**
     * Renders grid column
     *
     * @param  DataObject $row
     * @return string
     */
    public function render(DataObject $row): string
    {
        $image = 'product_listing_thumbnail';
        $imageUrl = $this->imageHelper->init($row, $image)->getUrl();

        return '<img src="' . $imageUrl . '" width="50"/>';
    }
}
