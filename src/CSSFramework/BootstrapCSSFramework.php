<?php

namespace WeDevelop\ElementalGrid\CSSFramework;

use DNADesign\Elemental\Models\BaseElement;

final class BootstrapCSSFramework implements CSSFrameworkInterface
{
    /**
     * @var BaseElement
     */
    private $baseElement;

    private const COLUMN_CLASSNAME = 'col';

    private const ROW_CLASSNAME = 'row';

    private const CONTAINER_CLASSNAME = 'container';

    private const FLUID_CONTAINER_CLASSNAME = 'container-fluid';

    /**
     * @param BaseElement $baseElement
     */
    public function __construct($baseElement)
    {
        $this->baseElement = $baseElement;
    }

    /**
     * @return string
     */
    public function getRowClasses()
    {
        return self::ROW_CLASSNAME;
    }

    /**
     * @return string
     */
    public function getColumnClasses()
    {
        $sizeClasses = $this->getSizeClasses();
        $offsetClasses = $this->getOffsetClasses();
        $visibilityClasses = $this->getVisibilityClasses();

        $classes = array_merge($sizeClasses, $offsetClasses, $visibilityClasses);

        return implode(' ', $classes);
    }

    /**
     * @return array
     */
    private function getVisibilityClasses()
    {
        $classes = [];

        if ($this->baseElement->VisibilityXS === 'hidden') {
            $classes[] = 'd-none d-sm-block';
        }
        if ($this->baseElement->VisibilitySM === 'hidden') {
            $classes[] = 'd-sm-none d-md-block';
        }
        if ($this->baseElement->VisibilityMD === 'hidden') {
            $classes[] = 'd-md-none d-lg-block';
        }
        if ($this->baseElement->VisibilityLG === 'hidden') {
            $classes[] = 'd-lg-none d-xl-block';
        }
        if ($this->baseElement->VisibilityXL === 'hidden') {
            $classes[] = 'd-xl-none';
        }

        return $classes;
    }

    /**
     * @return array
     */
    private function getSizeClasses()
    {
        $classes = [];

        if ($this->baseElement->SizeXS) {
            $classes[] = 'xs-' . $this->baseElement->SizeXS;
        }
        if ($this->baseElement->SizeSM) {
            $classes[] = 'sm-' . $this->baseElement->SizeSM;
        }
        if ($this->baseElement->SizeMD) {
            $classes[] = 'md-' . $this->baseElement->SizeMD;
        }
        if ($this->baseElement->SizeLG) {
            $classes[] = 'lg-' . $this->baseElement->SizeLG;
        }
        if ($this->baseElement->SizeXL) {
            $classes[] = 'xl-' . $this->baseElement->SizeXL;
        }

        foreach ($classes as &$class) {
            $class = sprintf('%s-%s', self::COLUMN_CLASSNAME, $class);
        }

        return $classes;
    }

    /**
     * @return array
     */
    private function getOffsetClasses()
    {
        $classes = [];

        if ($this->baseElement->OffsetXS) {
            $classes[] = 'offset-xs-' . $this->baseElement->OffsetXS;
        }
        if ($this->baseElement->OffsetSM) {
            $classes[] = 'offset-sm-' . $this->baseElement->OffsetSM;
        }
        if ($this->baseElement->OffsetMD) {
            $classes[] = 'offset-md-' . $this->baseElement->OffsetMD;
        }
        if ($this->baseElement->OffsetLG) {
            $classes[] = 'offset-lg-' . $this->baseElement->OffsetLG;
        }
        if ($this->baseElement->OffsetXL) {
            $classes[] = 'offset-xl-' . $this->baseElement->OffsetXL;
        }

        return $classes;
    }

    /**
     * @return string
     */
    public function getTitleSizeClass()
    {
        return $this->baseElement->TitleClass;
    }

    /***
     * @param bool $fluid
     * @return string
     */
    public function getContainerClass($fluid)
    {
        if ($fluid) {
            return self::FLUID_CONTAINER_CLASSNAME;
        }

        return self::CONTAINER_CLASSNAME;
    }
}
