<?php
namespace GDO\CKEditor;

use GDO\Core\GDO;
use GDO\Core\GDT_AutoInc;
use GDO\File\GDT_File;
use GDO\File\GDO_File;
use GDO\User\GDT_Level;
use GDO\User\GDT_ACLRelation;

final class GDO_CKFile extends GDO
{
    public function gdoColumns() : array
    {
        return [
            GDT_AutoInc::make('ckf_id'),
            GDT_File::make('ckf_file'),
            GDT_ACLRelation::make('ckf_acl'),
            GDT_Level::make('ckf_level'),
        ];
    }
    
    /**
     * @return GDO_File
     */
    public function getFile() { return $this->gdoValue('ckf_file'); }
    public function getFileID() { return $this->gdoVar('ckf_file'); }
    
    public function getHREF()
    {
        return href('CKEditor', 'Download', "&ckf_id={$this->getID()}");
    }
    
}
