<?php
class Matrix_Sidecat_Block_Sidebar extends Matrix_Sidecat_Block_Sidecat
{
	public function _construct() {
		$this->setTemplate('sidecat/sidecat.phtml');
		return parent::_construct();
	}
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
	public function getStoreCategories()
    {
        $helper = Mage::helper('sidecat/category');
        return $helper->getAllCategories();
    }
	protected function _renderCategoryMenuItemHtml($category, $level = 0, $isLast = false, $isFirst = false,
        $isOutermost = false, $outermostItemClass = '', $childrenWrapClass = '', $noEventAttributes = false)
    {
		$showType=Mage::getStoreConfig('sidecat/display_settings/show_type');
		if (!$category->getIsActive()) {
			return '';
		}
		$html = array();

		// get all child categories
		if (Mage::helper('catalog/category_flat')->isEnabled()) {
			$children = (array)$category->getChildrenNodes();
			$childrenCount = count($children);
		} else {
			$children = $category->getChildren();
			$childrenCount = $children->count();
		}
		$hasChildren = ($children && $childrenCount);

		// select active chid categories
		$activeChildren = array();
		foreach ($children as $child) {
			if ($child->getIsActive()) {
				$activeChildren[] = $child;
			}
		}
		$activeChildrenCount = count($activeChildren);
		$hasActiveChildren = ($activeChildrenCount > 0);

		// prepare list item html classes
		$classes = array();
		$classes[] = 'level' . $level;
		$classes[] = 'nav-' . $this->_getItemPosition($level);
		if ($this->isCategoryActive($category)) {
			$classes[] = 'active';
		}
		$linkClass = '';
		if ($isOutermost && $outermostItemClass) {
			$classes[] = $outermostItemClass;
			$linkClass = ' class="'.$outermostItemClass.'"';
		}
		if ($isFirst) {
			$classes[] = 'first';
		}
		if ($isLast) {
			$classes[] = 'last';
		}
		if ($hasActiveChildren) {
			$classes[] = 'parent';
		}

		// prepare list item attributes
		$attributes = array();
		if (count($classes) > 0) {
			$attributes['class'] = implode(' ', $classes);
		}
		if ($hasActiveChildren && !$noEventAttributes) {
			 $attributes['onmouseover'] = 'toggleMenu(this,1)';
			 $attributes['onmouseout'] = 'toggleMenu(this,0)';
		}

		// assemble list item with attributes
		$htmlLi = '<li';
		foreach ($attributes as $attrName => $attrValue) {
			$htmlLi .= ' ' . $attrName . '="' . str_replace('"', '\"', $attrValue) . '"';
		}
		$htmlLi .= '>';
		$html[] = $htmlLi;
		if ($hasActiveChildren) {
			if($showType == 'click-2-click'){
				$html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'>';
				$html[] = '<span>' . $this->escapeHtml($category->getName()) . '</span>';
				$html[] = '</a>';
				$html[] = '<a href="javascript://" class="right show-cat">&nbsp;';
				$html[] = '</a>';
			}
			else{
				$html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'>';
				$html[] = '<span>' . $this->escapeHtml($category->getName()) . '</span>';
				$html[] = '</a>';
			}
		}
		else{
			$html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'>';
			$html[] = '<span>' . $this->escapeHtml($category->getName()) . '</span>';
			$html[] = '</a>';
		}
		// render child categories
		$htmlChildren = '';
		$j = 0;
		foreach ($activeChildren as $child) {
			$htmlChildren .= $this->_renderCategoryMenuItemHtml(
				$child,
				($level + 1),
				($j == $activeChildrenCount - 1),
				($j == 0),
				false,
				$outermostItemClass,
				$childrenWrapClass,
				$noEventAttributes
			);
			$j++;
		}
		if (!empty($htmlChildren)) {
			if ($childrenWrapClass) {
				$html[] = '<div class="' . $childrenWrapClass . '">';
			}
			$html[] = '<ul class="level' . $level . '">';
			$html[] = $htmlChildren;
			$html[] = '</ul>';
			if ($childrenWrapClass) {
				$html[] = '</div>';
			}
		}

		$html[] = '</li>';

		$html = implode("\n", $html);
		return $html;
    }
}
