<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) BoonEx Pty Limited - http://www.boonex.com/
 * CC-BY License - http://creativecommons.org/licenses/by/3.0/
 *
 * @defgroup    DolphinCore Dolphin Core
 * @{
 */

bx_import('BxDolPrivacy');

/**
 * Privacy representation.
 * @see BxDolPrivacy
 */
class BxBasePrivacy extends BxDolPrivacy {

    protected $_oTemplate;

    public function __construct ($aOptions, $oTemplate) {
        parent::__construct ($aOptions);

        if ($oTemplate)
            $this->_oTemplate = $oTemplate;
        else
            $this->_oTemplate = BxDolTemplate::getInstance();
    }

    protected function _addJsCss()
    {
    	/*
        $this->_oTemplate->addJs('BxDolGrid.js');
        $this->_oTemplate->addCss('grid.css');
        */
    }

    protected function _echoResultJson($a, $isAutoWrapForFormFileSubmit = false)
    {
        header('Content-type: text/html; charset=utf-8');    

        require_once(BX_DIRECTORY_PATH_PLUGINS . 'Services_JSON.php');

        $oParser = new Services_JSON();
        $s = $oParser->encode($a);
        if ($isAutoWrapForFormFileSubmit && !empty($_FILES)) 
            $s = '<textarea>' . $s . '</textarea>';
        echo $s;
    }
}

/** @} */
