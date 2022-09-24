<?php
namespace GDO\CKEditor;

use GDO\Core\GDO_Module;
use GDO\Language\GDO_Language;
use GDO\UI\GDT_Message;

/**
 * CKEditor bindings.
 * 
 * @author gizmore
 * @version 6.10.4
 * @since 6.8.0
 */
final class Module_CKEditor extends GDO_Module
{
    public function getDependencies() : array { return ['JQuery']; }
    public function thirdPartyFolders() : array { return ['/ckeditor5/']; }
    public function onLoadLanguage() : void { $this->loadLanguage('lang/ckeditor'); }
    public function getClasses() : array
    {
        return [
            GDO_CKFile::class,
        ];
    }
    
    ############
    ### Init ###
    ############
    public function onModuleInit()
    {
        GDT_Message::$EDITOR_NAME = 'CKEditor';
    }
    
    public function onIncludeScripts() : void
    {
        $this->addJS('ckeditor5/ckeditor.js');
        $iso = strtolower(GDO_Language::current()->getISO());
        if ($iso != 'en')
        {
            $this->addJS('ckeditor5/translations/'.$iso.'.js');
        }
        
        $this->addJS('js/gdo6-ckeditor.js');
    }
    
}
