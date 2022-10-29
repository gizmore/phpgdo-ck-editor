<?php
namespace GDO\CKEditor\Method;

use GDO\Core\Method;
use GDO\File\Method\GetFile;
use GDO\CKEditor\GDO_CKFile;
use GDO\Util\Common;
use GDO\Core\GDT_Object;

final class Download extends Method
{

	public function isTrivial(): bool
	{
		return false;
	}

	public function gdoParameters(): array
	{
		return [
			GDT_Object::make('cfk_id')->table(GDO_CKFile::table())->notNull(),
		];
	}
	
	public function getFile(): GDO_CKFile
	{
		return $this->gdoParameterValue('cfk_id');
	}

	public function execute()
	{
		if ($ckfile = $this->getFile());
		{
			$_REQUEST['file'] = $ckfile->getFileID();
			return GetFile::make()->execute();
		}
	}

}
